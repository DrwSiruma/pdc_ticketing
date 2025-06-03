<?php
include('../includes/connection.php');
session_start();

// Audit log function
function log_activity($conn, $user_id, $activity, $type) {
    $sql = "INSERT INTO tbl_auditlog (user_id, activity, type, date_posted) VALUES (?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $activity, $type);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

function notifications($conn, $notif_msg, $admin_id) {
    $sql = "INSERT INTO tbl_notif (notif_msg, user_id, post_date) VALUES (?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $notif_msg, $admin_id);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare statement for notifications: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staff_id = $_SESSION['id'];
    $action_type = trim($_POST['action_type']);
    $ticket_num = $_GET['id'];

    $time_in = trim($_POST['time_in']);
    $time_out = trim($_POST['time_out']);
    $findings = trim($_POST['findings']);
    $action = trim($_POST['action']);
    $diagnosis = trim($_POST['diagnosis']);
    $recom = trim($_POST['recom']);
    $client_name = trim($_POST['fn_client']);
    $signature_client = $_POST['signature_client']; // no escaping here; handled by prepared statements
    $emp_name = trim($_POST['fn_personnel']);
    $signature_personnel = $_POST['signature_personnel'];
    $overdue = trim($_POST['overdue']);
    $report_remarks = ($overdue == 1) ? "Done in Overdue" : "";

    // Prepare update for tbl_ticketreport
    $query = "UPDATE tbl_ticketreport SET 
        time_in = ?, time_out = ?, findings = ?, action = ?, diagnosis = ?, 
        recom = ?, fn_client = ?, signature_client = ?, signature_personnel = ?, 
        report_remarks = ?" . ($action_type === 'finish' ? ", status = 1" : "") . "
        WHERE ticket_num = ?";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssssssssss",
        $time_in,
        $time_out,
        $findings,
        $action,
        $diagnosis,
        $recom,
        $client_name,
        $signature_client,
        $signature_personnel,
        $report_remarks,
        $ticket_num
    );

    // Prepare overdue update
    $update_overdue_query = "UPDATE tbl_tickets SET overdue = ? WHERE ticket_num = ?";
    $stmt_overdue = $conn->prepare($update_overdue_query);
    $stmt_overdue->bind_param("ss", $overdue, $ticket_num);

    if ($stmt->execute() && $stmt_overdue->execute()) {
        if ($action_type === 'finish') {
            $update_status_query = "UPDATE tbl_tickets SET rprt = '1' WHERE ticket_num = ?";
            $stmt_status = $conn->prepare($update_status_query);
            $stmt_status->bind_param("s", $ticket_num);
            $stmt_status->execute();
            $stmt_status->close();

            log_activity($conn, $staff_id, "Finished ticket report of: #$ticket_num", "Report");
            $_SESSION['success'] = "Report updated successfully.";
            header("Location: ticket");
        } else {
            log_activity($conn, $staff_id, "Updated ticket report of: #$ticket_num", "Report");
            $_SESSION['success'] = "Report updated successfully.";
            notifications($conn, "Service Report, ticket #: $ticket_num, is modified by $emp_name.", "0");
            header("Location: edit-report?id=$ticket_num");
        }
    } else {
        $_SESSION['error'] = "Failed to update report.";
        header("Location: edit-report?id=$ticket_num");
    }

    $stmt->close();
    $stmt_overdue->close();
    exit();
}
?>