<?php
include('../../includes/connection.php');
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
    $id = intval($_POST['pid']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($new_password) || empty($confirm_password)) {
        $_SESSION['password-error'] = "All fields are required.";
        header("Location: edit-user?id=$id");
        exit();
    }

    if ($new_password !== $confirm_password) {
        $_SESSION['password-error'] = "Passwords do not match.";
        header("Location: edit-user?id=$id");
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $sql = "UPDATE tbl_useraccounts SET password = ?, updated = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashed_password, $id);

    if ($stmt->execute()) {
        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Updated password of user: #$id", "Account");

        $_SESSION['password-success'] = "Password reset successfully.";
    } else {
        $_SESSION['password-error'] = "Failed to reset password. Please try again.";
    }
    header("Location: edit-user?id=$id");
    exit();
} else {
    $_SESSION['password-error'] = "Invalid request.";
    header("Location: edit-user?id=$id");
    exit();
}
?>