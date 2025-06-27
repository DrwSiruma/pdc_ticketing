<?php
include('../includes/connection.php');
session_start();

function log_activity($conn, $user_id, $activity, $type) {
    $sql = "INSERT INTO tbl_auditlog (user_id, activity, type, date_posted) VALUES (?, ?, ?, NOW(6))";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iss", $user_id, $activity, $type); // Corrected type specifiers
        $stmt->execute();
        $stmt->close();
    } else {
        // Handle the error appropriately in a real application
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $designation = trim($_POST['designation']);
    
    if (empty($name) || empty($designation)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: help-categories");
        exit();
    }
    
    // Insert new item category into the database
    $sql = "INSERT INTO tbl_itemcategory (name, designation) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $designation);

    if ($stmt->execute()) {
        $new_outlet_id = $stmt->insert_id;

        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Added new item category: $name", "ItemCategory");

        $_SESSION['success'] = "Category added successfully.";
    } else {
        $_SESSION['error'] = "Failed to add category. Please try again.";
    }
    header("Location: help-categories");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: help-categories");
    exit();
}
?>