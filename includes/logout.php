<?php
    include('connection.php');
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

    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        log_activity($conn, $user_id, "User logged out", "Logout");
    }

    session_destroy();
    header("Location: /pdc_ticketing/pages/login");
    exit();
?>