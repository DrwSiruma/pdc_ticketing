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
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and Password are required.";
        header("Location: login");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_useraccounts WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['username'] = $user['username'];

                    // Log the login activity
                    log_activity($conn, $user['id'], "User logged in", "Login");

                    if ($user['role'] === 'admin') {
                        header("Location: admin/dashboard");
                    } elseif ($user['role'] === 'outlet' || $user['role'] === 'office') {
                        header("Location: user/dashboard");
                    } elseif ($user['role'] === 'dev') {
                        header("Location: ../dev/dashboard");
                    } elseif ($user['role'] === 'it' || $user['role'] === 'maintenance') {
                        header("Location: staff/dashboard");
                    }
                    exit();
                } else {
                    $_SESSION['error'] = "Incorrect password.";
                }
            } else {
                $_SESSION['error'] = "Username not found.";
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Database error: " . $conn->error;
        }

        header("Location: login");
        exit();
    }
} else {
    header("Location: login");
    exit();
}