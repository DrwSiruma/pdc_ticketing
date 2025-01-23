<?php
include('../includes/connection.php');
session_start();

function log_activity($conn, $user_id, $activity, $type) {
    $sql = "INSERT INTO tbl_auditlog (user_id, activity, type, date_posted) VALUES (?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $activity, $type);
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle the error appropriately in a real application
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

function notifications($conn, $notif_msg, $outlet_id) {
    $sql = "INSERT INTO tbl_notif (notif_msg, user_id, post_date) VALUES (?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $notif_msg, $outlet_id);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare statement for notifications: " . $conn->error);
    }
}

function ticket_report($conn, $ticket_num, $outlet_id, $staff_id, $report_type, $outlet_name, $staff_name, $ticket_date, $subject) {
    $sql = "INSERT INTO tbl_ticketreport (ticket_num, outlet_id, emp_id, report_type, outlet_name, emp_name, ticket_date, subj, modify_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("siisssss", $ticket_num, $outlet_id, $staff_id, $report_type, $outlet_name, $staff_name, $ticket_date, $subject);
        $stmt->execute();
        $stmt->close();
    } else {
        error_log("Failed to prepare statement for ticket report: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ticket_num = $_GET['id'];
    $outlet_id = $_GET['user'];
    $concern_type = trim($_POST['concern_type']);
    $priority_type = trim($_POST['priority_type']);
    $remarks = trim($_POST['remarks']);
    $assigned = trim($_POST['assigned']);
    $startdate = trim($_POST['startdate']);
    $enddate = trim($_POST['enddate']);
    $outlet_name = trim($_POST['outlet_name']);
    $staff_name = trim($_POST['staff_name']);
    $designation = trim($_POST['designation']);
    $ticket_date = trim($_POST['date_posted']);
    $subject = trim($_POST['subject']);
    $status = "1";

    if (empty($concern_type) || empty($priority_type) || empty($assigned) || empty($startdate) || empty($enddate)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ticket-approval?id=$ticket_num");
        exit();
    } else {
        // Update ticket in the database
        $sql = "UPDATE tbl_tickets SET priority_type = ?, concern_type = ?, status = ?, remark = ?, sched_start = ?, sched_end = ?, assigned = ?, date_modified = NOW() WHERE ticket_num = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $priority_type, $concern_type, $status, $remarks, $startdate, $enddate, $assigned, $ticket_num);

        if ($stmt->execute()) {
            $admin_id = $_SESSION['id'];
            log_activity($conn, $admin_id, "Approve ticket #: $ticket_num", "Ticket");
            notifications($conn, "Your ticket #: $ticket_num, is approved. You may check the ticket status.", $outlet_id);
            ticket_report($conn, $ticket_num, $outlet_id, $assigned, $designation, $outlet_name, $staff_name, $ticket_date, $subject);

            $_SESSION['success'] = "Ticket approved successfully.";
            header("Location: ticket?tab=open");
            exit();
        } else {
            $_SESSION['error'] = "Failed to approve ticket. Please try again.";
            
            header("Location: ticket-approval?id=$ticket_num");
            exit();
        }
    }

} else {
    header("Location: ticket-approval?id=$ticket_num");
    exit();
}
?>