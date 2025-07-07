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
    $item_id = intval($_POST['item_id']);
    $item_name = trim($_POST['item_name']);
    if ($item_id && $item_name !== '') {
        $stmt = $conn->prepare("UPDATE tbl_itemlist SET name = ? WHERE id = ?");
        $stmt->bind_param('si', $item_name, $item_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Item updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update item.";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid item data.";
    }
    // Redirect back to the item list page
    $categ = (isset($_POST['categ_name']) ? intval($_POST['categ_name']) : 0);
    if ($categ) {
        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Edit item: $item_name", "Item");
        header("Location: item-list?item=$categ");
    } else {
        header("Location: item-list?item=$categ");
    }
    exit();
} else {
    header("Location: item-list=$categ");
    exit();
}
