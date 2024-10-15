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

    // Image upload handling
    $target_dir = "../img/item-category/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['error'] = "File is not an image.";
        header("Location: add-category");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['error'] = "Sorry, your file is too large.";
        header("Location: add-category");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: add-category");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error'] = "Sorry, file already exists.";
        header("Location: add-category");
        exit();
    }

    if (empty($image) || empty($name) || empty($designation)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: add-category");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        header("Location: add-category");
        exit();
    }

    // Insert new item category into the database
    $sql = "INSERT INTO tbl_itemcategory (name, img_name, img_path, designation) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $image, $target_file, $designation);

    if ($stmt->execute()) {
        $new_outlet_id = $stmt->insert_id;

        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Added new item category: $name", "ItemCategory");

        $_SESSION['success'] = "Category added successfully.";
    } else {
        $_SESSION['error'] = "Failed to add category. Please try again.";
    }
    header("Location: add-category");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: add-category");
    exit();
}
?>