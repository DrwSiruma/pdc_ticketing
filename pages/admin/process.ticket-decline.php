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
    $remarks = trim($_POST['final_reason']);
    $status = "3";

    if (empty($remarks)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: view-ticket?id=$ticket_num");
        exit();
    } else {
        // Update ticket in the database
        $sql = "UPDATE tbl_tickets SET status = ?, remark = ?, date_modified = NOW() WHERE ticket_num = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $status, $remarks, $ticket_num);

        if ($stmt->execute()) {
            $admin_id = $_SESSION['id'];
            log_activity($conn, $admin_id, "Reject ticket #: $ticket_num", "Ticket");
            notifications($conn, "Your ticket #: $ticket_num, is declined due to <i>$remarks</i>.", $outlet_id);

            $_SESSION['success'] = "Ticket rejected successfully.";
            header("Location: ticket?tab=rejected");
            exit();
        } else {
            $_SESSION['error'] = "Failed to update ticket. Please try again.";
            header("Location: view-ticket?id=$ticket_num");
            exit();
        }
    }

} else {
    header("Location: ticket-approval?id=$ticket_num");
    exit();
}
?>