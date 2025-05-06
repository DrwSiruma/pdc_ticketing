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
    $signature_client = mysqli_real_escape_string($conn, $_POST['signature_client']);
    $signature_personnel = mysqli_real_escape_string($conn, $_POST['signature_personnel']);
    $overdue = trim($_POST['overdue']);
    if ($overdue == 1) {
        $report_remarks = "Done in Overdue";
    } else {
        $report_remarks = "";
    }

    if ($action_type === 'save') {
        // Logic for saving the report
        $query = "UPDATE tbl_ticketreport SET 
            time_in = '$time_in',
            time_out = '$time_out',
            findings = '$findings',
            action = '$action',
            diagnosis = '$diagnosis',
            recom = '$recom',
            fn_client = '$client_name',
            signature_client = '$signature_client',
            signature_personnel = '$signature_personnel',
            report_remarks = '$report_remarks'
            WHERE ticket_num = '$ticket_num'";
        
        $update_overdue_query = "UPDATE tbl_tickets SET overdue = '$overdue' WHERE ticket_num = '$ticket_num'";
        mysqli_query($conn, $update_overdue_query);
        mysqli_query($conn, $query);
        log_activity($conn, $staff_id, "Updated ticket report of: #$ticket_num", "Report");
        $_SESSION['success'] = "Report updated successfully.";
        header("Location: edit-report?id=$ticket_num"); // Redirect after success
        exit();
    } else {
        $_SESSION['error'] = "failed to update report.";
        header("Location: edit-report?id=$ticket_num");
        exit();
    }
}

?>