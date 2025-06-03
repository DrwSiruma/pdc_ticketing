<?php
include('../includes/connection.php');
session_start();

// Check if id and status are set in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = "0";

    // Update the product status in the database
    $sql = "UPDATE tbl_notif SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    
    if ($stmt->execute()) {
        $_SESSION['success'] = "Done.";
        // Redirect back to the products page
        header("Location: notifications");
        exit();
    } else {
        $_SESSION['error'] = "Failed to update status. Please try again.";
        // Redirect back to the products page
        header("Location: notifications");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: notifications");
    exit();
}
?>