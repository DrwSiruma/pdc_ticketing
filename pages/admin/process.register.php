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
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    if (empty($name) || empty($username) || empty($password) || empty($role)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: add-user");
        exit();
    } else {
        // Check if the username already exists
        $sql = "SELECT * FROM tbl_useraccounts WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Username already exists.";
            header("Location: add-user");
            exit();
        } else {
            // Encrypt the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into the database
            $sql = "INSERT INTO tbl_useraccounts (name, username, password, role) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $username, $hashedPassword, $role);

            if ($stmt->execute()) {
                $new_user_id = $stmt->insert_id;
                
                $admin_id = $_SESSION['id'];
                log_activity($conn, $admin_id, "Added new user id: #$new_user_id as $role", "Account");

                $_SESSION['success'] = "User added successfully.";
                header("Location: add-user");
                exit();
            } else {
                $_SESSION['error'] = "Failed to register. Please try again.";
                header("Location: add-user");
                exit();
            }
        }
    }
} else {
    header("Location: admin.register.php");
    exit();
}