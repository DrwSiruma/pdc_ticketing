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
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $outlet_id = $_GET['user'];
    $ticket_num = $_GET['id'];
    $start_date = trim($_POST['resched_sdate']);
    $end_date = trim($_POST['resched_edate']);
    $remarks = trim($_POST['final_rreason']);
    $status = "4";

    if (empty($start_date) || empty($end_date) || empty($remarks)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: view-ticket?id=$ticket_num");
        exit();
    } else {
        $final_remarks = "Re-scheduled from $start_date to $end_date. Reason: $remarks";
        // Update ticket in the database
        $sql = "UPDATE tbl_tickets SET status = ?, remark = ?, sched_start = ?, sched_end = ?, date_modified = NOW() WHERE ticket_num = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $status, $final_remarks, $start_date, $end_date, $ticket_num);

        if ($stmt->execute()) {
            $admin_id = $_SESSION['id'];
            log_activity($conn, $admin_id, "Re-scheduled ticket #: $ticket_num", "Ticket");
            notifications($conn, "Your ticket #: $ticket_num, is re-scheduled for the reason \"$remarks\".", $outlet_id);

            $_SESSION['success'] = "Ticket re-scheduled successfully.";
            header("Location: ticket?tab=open");
            exit();
        } else {
            $_SESSION['error'] = "Failed to update ticket. Please try again.";
            header("Location: view-ticket?id=$ticket_num");
            exit();
        }
    }

} else {
    header("Location: view-ticket?id=$ticket_num");
    exit();
}
?>