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
    $id = trim($_POST['itemid']);
    $name = trim($_POST['name']);
    $designation = trim($_POST['designation']);
    $target_dir = "../img/item-category/";
    $image = $_FILES['image']['name'];
    $image_path = '';
    $image_name = '';

    $itemcategory_qry = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE id = $id");
    $category_res = mysqli_fetch_assoc($itemcategory_qry);
    $current_image_path = $category_res['img_path'];
    $current_image_name = $product['img_name'];

    // Check if a new image is uploaded
    if (!empty($image)) {
        $target_file = $target_dir . basename($image);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Validate the image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            $_SESSION['error'] = "File is not an image.";
            header("Location: edit-category?id=$id");
            exit();
        }
        if ($_FILES['image']['size'] > 5000000) {
            $_SESSION['error'] = "Sorry, your file is too large.";
            header("Location: edit-category?id=$id");
            exit();
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            header("Location: edit-category?id=$id");
            exit();
        }
        if (file_exists($target_file)) {
            $_SESSION['error'] = "Sorry, file already exists.";
            header("Location: edit-category?id=$id");
            exit();
        }
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            header("Location: edit-category?id=$id");
            exit();
        }
        $image_path = $target_file;
        $image_name = $image;

        // Delete the old image if a new one is uploaded
        if (!empty($current_image_path) && file_exists($current_image_path)) {
            unlink($current_image_path);
        }
    }

    if (!empty($image_path)) {
        $sql = "UPDATE tbl_itemcategory SET name=?, img_name=?, img_path=?, designation = ? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $image_name, $image_path, $designation, $id);
    } else {
        $sql = "UPDATE tbl_itemcategory SET name=?, designation = ? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $designation, $id);
    }

    if ($stmt->execute()) {
        $admin_id = $_SESSION['id'];
        log_activity($conn, $admin_id, "Updated status of item category: $id", "Item");

        $_SESSION['success'] = "Item Category updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update item category. Please try again.";
    }
    header("Location: edit-category?id=$id");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: edit-category?id=$id");
    exit();
}

?>