<?php
include('../includes/connection.php');
session_start();

// Check if id and status are set in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = "0";
    $unread = "1";

    // Update the product status in the database
    $sql = "UPDATE tbl_notif SET status = ? WHERE user_id = ? AND status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $status, $id, $unread);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Done.";
        // Redirect back to the products page
        header("Location: notification");
        exit();
    } else {
        $_SESSION['error'] = "Failed to update status. Please try again.";
        // Redirect back to the products page
        header("Location: notification");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: notification");
    exit();
}
?>