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

// Check if id and status are set in the query string
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];
    
    // Validate the status value
    if ($status !== '1' && $status !== '0') {
        $_SESSION['error'] = "Invalid status value.";
        header("Location: inventory");
        exit();
    }

    $sql = "UPDATE tbl_itemcategory SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Updated status of item category: $id", "Item");

        $_SESSION['success'] = "Category status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update category status. Please try again.";
    }

    header("Location: inventory");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: inventory");
    exit();
}
?>