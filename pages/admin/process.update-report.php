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

function notifications($conn, $notif_msg, $staff_id) {
    $sql = "INSERT INTO tbl_notif (notif_msg, user_id, post_date) VALUES (?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $notif_msg, $staff_id);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare statement for notifications: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_SESSION['id'];
    $action_type = trim($_POST['action_type']);
    $ticket_num = $_GET['id'];

    $time_in = trim($_POST['time_in']);
    $time_out = trim($_POST['time_out']);
    $findings = trim($_POST['findings']);
    $action = trim($_POST['action']);
    $diagnosis = trim($_POST['diagnosis']);
    $recom = trim($_POST['recom']);
    $client_name = trim($_POST['fn_client']);
    $signature_client = $_POST['signature_client'];
    $emp_id = trim($_POST['emp_id']);
    $signature_personnel = $_POST['signature_personnel'];
    $overdue = trim($_POST['overdue']);
    $report_remarks = ($overdue == 1) ? "Done in Overdue" : "";

    // Check for acknowledge by fields (maintenance report)
    $acknowledge_by = isset($_POST['fn_ack']) ? trim($_POST['fn_ack']) : null;
    $signature_acknowledge = isset($_POST['signature_ack']) ? $_POST['signature_ack'] : null;

    // Prepare update for tbl_ticketreport
    if ($acknowledge_by !== null || $signature_acknowledge !== null) {
        // Maintenance report with acknowledge by fields
        $query = "UPDATE tbl_ticketreport SET 
            time_in = ?, time_out = ?, findings = ?, action = ?, diagnosis = ?, 
            recom = ?, fn_client = ?, signature_client = ?, fn_signiture2 = ?, signiture_2 = ?, signature_personnel = ?, 
            report_remarks = ?, modify_date = NOW(6)" . ($action_type === 'finish' ? ", status = 1, posted_date = NOW(6)" : "") . "
            WHERE ticket_num = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }
        $stmt->bind_param(
            "sssssssssssss",
            $time_in,
            $time_out,
            $findings,
            $action,
            $diagnosis,
            $recom,
            $client_name,
            $signature_client,
            $acknowledge_by,
            $signature_acknowledge,
            $signature_personnel,
            $report_remarks,
            $ticket_num
        );
    } else {
        // IT report without acknowledge by fields
        $query = "UPDATE tbl_ticketreport SET 
            time_in = ?, time_out = ?, findings = ?, action = ?, diagnosis = ?, 
            recom = ?, fn_client = ?, signature_client = ?, signature_personnel = ?, 
            report_remarks = ?, modify_date = NOW(6)" . ($action_type === 'finish' ? ", status = 1, posted_date = NOW(6)" : "") . "
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
    }

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

            log_activity($conn, $admin_id, "Finished ticket report of: #$ticket_num", "Report");
            $_SESSION['success'] = "Report updated successfully.";
            header("Location: ticket");
            notifications($conn, "Services Report, ticket #: $ticket_num, is closed by the admin.", $emp_id);
        } else {
            log_activity($conn, $admin_id, "Updated ticket report of: #$ticket_num", "Report");
            notifications($conn, "Services Report, ticket #: $ticket_num, is modified by the admin.", $emp_id);
            $roleSql = "SELECT * FROM tbl_tickets WHERE ticket_num = ?";
            $stmt_role = $conn->prepare($roleSql);
            $stmt_role->bind_param("s", $ticket_num);
            $stmt_role->execute();
            $tickets = $stmt_role->get_result();
            $row = $tickets->fetch_assoc();
            if ($row && $row['designation'] == 1) {
                $_SESSION['success'] = "Report updated successfully.";
                header("Location: edit-report-it?id=$ticket_num");
            } elseif ($row && $row['designation'] == 2) {
                $_SESSION['success'] = "Report updated successfully.";
                header("Location: edit-report-mt?id=$ticket_num");
            }
            $stmt_role->close();
        }
    } else {
        $roleSql = "SELECT * FROM tbl_tickets WHERE ticket_num = ?";
        $stmt_role = $conn->prepare($roleSql);
        $stmt_role->bind_param("s", $ticket_num);
        $stmt_role->execute();
        $tickets = $stmt_role->get_result();
        $row = $tickets->fetch_assoc();
        if ($row && $row['designation'] == 1) {
            $_SESSION['error'] = "Failed to update report.";
            header("Location: edit-report-it?id=$ticket_num");
        } elseif ($row && $row['designation'] == 2) {
            $_SESSION['error'] = "Failed to update report.";
            header("Location: edit-report-mt?id=$ticket_num");
        }
        $stmt_role->close();
    }

    $stmt->close();
    $stmt_overdue->close();
    exit();
}
?>