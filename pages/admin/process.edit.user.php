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
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $role = trim($_POST['role']);
    $status = trim($_POST['status']);

    if (empty($name) || empty($username) || empty($role) || empty($status)) {
        $_SESSION['profile-error'] = "All fields are required.";
        header("Location: edit-user?id=$id");
        exit();
    } else {
        // Check if the username already exists (excluding the current user)
        $sql = "SELECT * FROM tbl_useraccounts WHERE username = ? AND id != ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $username, $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['profile-error'] = "Username already exists.";
            header("Location: edit-user?id=$id");
            exit();
        } else {
            // Update user in the database
            $sql = "UPDATE tbl_useraccounts SET name = ?, username = ?, role = ?, status = ?, updated = NOW() WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $name, $username, $role, $status, $id);

            if ($stmt->execute()) {
                $admin_id = $_SESSION['id'];
                log_activity($conn, $admin_id, "Updated information of user: #$id", "Account");

                $_SESSION['profile-success'] = "User updated successfully.";
                header("Location: edit-user?id=$id");
                exit();
            } else {
                $_SESSION['profile-error'] = "Failed to update user. Please try again.";
            }
            header("Location: edit-user?id=$id");
            exit();
        }
    }
} else {
    $_SESSION['profile-error'] = "Invalid request.";
    header("Location: users");
    exit();
}

?>