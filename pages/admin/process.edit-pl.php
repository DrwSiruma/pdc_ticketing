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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ticket_num = $_GET['id'];
    $new_pl = trim($_POST['new_pl']);

    if (empty($new_pl) || !isset($ticket_num)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: view-ticket?id=$ticket_num");
        exit();
    } else {
        // Update ticket in the database
        $sql = "UPDATE tbl_tickets SET priority_type = ?, date_modified = NOW() WHERE ticket_num = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_pl, $ticket_num);

        if ($stmt->execute()) {
            $admin_id = $_SESSION['id'];
            log_activity($conn, $admin_id, "Change the Priority level of ticket #: $ticket_num", "Ticket");

            $_SESSION['success'] = "Priority level changed successfully.";
            header("Location: view-ticket?id=$ticket_num");
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