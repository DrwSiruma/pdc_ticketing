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
    $concern_type = trim($_POST['concern_type']);
    $priority_type = trim($_POST['priority_type']);
    $remarks = trim($_POST['remarks']);
    $assigned = trim($_POST['assigned']);
    $startdate = trim($_POST['startdate']);
    $enddate = trim($_POST['enddate']);
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

            echo "<script>alert('Ticket #$ticket_num approved successfully.');</script>";
            $_SESSION['success'] = "Ticket approved successfully.";
            header("Location: ticket?tab=open");
            exit();
        } else {
            $_SESSION['error'] = "Failed to approve ticket. Please try again.";
        }
        header("Location: ticket-approval?id=$ticket_num");
        exit();
    }

} else {
    header("Location: ticket-approval?id=$ticket_num");
    exit();
}
?>