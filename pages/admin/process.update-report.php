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

    $admin_id = $_SESSION['id'];
    $action_type = trim($_POST['action_type']);
    $ticket_num = $_GET['id'];
    $time_in = trim($_POST['time_in']);
    $time_out = trim($_POST['time_out']);
    $findings = trim($_POST['findings']);
    $recom_at = trim($_POST['recom_at']);
    $client_name = trim($_POST['fn_client']);
    $signature_client = mysqli_real_escape_string($conn, $_POST['signature_client']);
    $signature_personnel = mysqli_real_escape_string($conn, $_POST['signature_personnel']);

    if ($action_type === 'save') {
        // Logic for saving the report
        $query = "UPDATE tbl_ticketreport SET 
            time_in = '$time_in',
            time_out = '$time_out',
            findings = '$findings',
            recom_at = '$recom_at',
            fn_client = '$client_name',
            signature_client = '$signature_client',
            signature_personnel = '$signature_personnel'
            WHERE ticket_num = '$ticket_num'";
        mysqli_query($conn, $query);
        log_activity($conn, $admin_id, "Updated ticket report of: #$ticket_num", "Report");
        $_SESSION['success'] = "Report updated successfully.";
        header("Location: edit-report?id=$ticket_num"); // Redirect after success
        exit();
    } elseif ($action_type === 'finish') {
        // Logic for finishing the report (set status to 1)
        if (empty($findings) || empty($recom_at) || empty($client_name)) {
            $_SESSION['error'] = "All fields are required.";
            header("Location: edit-report?id=$ticket_num");
            exit();
        } else {
            $query = "UPDATE tbl_ticketreport SET 
                status = 1, 
                time_in = '$time_in',
                time_out = '$time_out',
                findings = '$findings',
                recom_at = '$recom_at',
                fn_client = '$client_name',
                signature_client = '$signature_client',
                signature_personnel = '$signature_personnel'
                WHERE ticket_num = '$ticket_num'";
            mysqli_query($conn, $query);
            log_activity($conn, $admin_id, "Finished ticket report of: #$ticket_num", "Report");
            $_SESSION['success'] = "Report updated successfully.";
            header("Location: ticket"); // Redirect after success
            exit();
        }
    } else {
        $_SESSION['error'] = "failed to update report.";
        header("Location: edit-report?id=$ticket_num");
        exit();
    }
}

?>