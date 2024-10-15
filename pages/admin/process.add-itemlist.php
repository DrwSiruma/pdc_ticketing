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
    $name = trim($_POST['name']);
    $itemcateg = trim($_POST['itemcateg']);

    if (empty($name) || empty($itemcateg)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: item-list?item=$itemcateg");
        exit();
    } else {
        
            $sql = "INSERT INTO tbl_itemlist (name, category) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name, $itemcateg);

            if ($stmt->execute()) {
                $new_id = $stmt->insert_id;
                
                $admin_id = $_SESSION['id'];
                log_activity($conn, $admin_id, "Added new item: $name", "Item");

                $_SESSION['success'] = "Item added successfully.";
                header("Location: item-list?item=$itemcateg");
                exit();
            } else {
                $_SESSION['error'] = "Failed to add Item. Please try again.";
                header("Location: item-list?item=$itemcateg");
                exit();
            }
    }
} else {
    header("Location: item-list?item=$itemcateg");
    exit();
}