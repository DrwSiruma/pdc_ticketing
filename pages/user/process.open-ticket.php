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
        error_log("Failed to prepare statement for logging activity: " . $conn->error);
    }
}

// Function to generate unique ticket number
function generate_ticket_number($conn) {
    $month = date('m'); // Current month in 2 digits
    $year = date('y');  // Last 2 digits of the current year

    // Query to get the latest ticket number for the current month and year
    $result = $conn->query("SELECT ticket_num FROM tbl_tickets WHERE ticket_num LIKE 'PDCS{$month}{$year}%' ORDER BY ticket_num DESC LIMIT 1");

    if ($result->num_rows > 0) {
        // If there is an existing ticket, extract and increment the series
        $row = $result->fetch_assoc();
        $last_ticket_num = $row['ticket_num'];
        $last_series = (int)substr($last_ticket_num, -3); // Extract the last 3 digits
        $new_series = str_pad($last_series + 1, 3, '0', STR_PAD_LEFT); // Increment series and pad to 3 digits
    } else {
        // No tickets for the month, start with series "001"
        $new_series = '001';
    }

    // Format ticket number
    return "PDCS{$month}{$year}{$new_series}";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $outlet = trim($_POST['outlet']);
    $designation = trim($_POST['designation']);
    $topic = trim($_POST['topic']);
    $item = trim($_POST['item']);
    $description = trim($_POST['description']);
    $remark = htmlspecialchars("Our team has received your request, and we’re already reviewing the details. We’ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.");

    // Generate unique ticket number
    $ticketnum = generate_ticket_number($conn);

    // Image upload handling
    $target_dir = "../img/sup_doc/";
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        $_SESSION['error'] = "File is not an image.";
        header("Location: open-ticket");
        exit();
    }

    // Check file size (5MB limit)
    if ($_FILES['image']['size'] > 5000000) {
        $_SESSION['error'] = "Sorry, your file is too large.";
        header("Location: open-ticket");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header("Location: open-ticket");
        exit();
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['error'] = "Sorry, file already exists.";
        header("Location: open-ticket");
        exit();
    }

    if (empty($image) || empty($outlet) || empty($designation) || empty($topic) || empty($item) || empty($description)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: open-ticket");
        exit();
    }

    // Move uploaded file to target directory
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        header("Location: open-ticket");
        exit();
    }

    // Insert new ticket into the database
    $sql = "INSERT INTO tbl_tickets (ticket_num, outlet, designation, topiccateg, topicitem, img_name, file_path, description, remark) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $ticketnum, $outlet, $designation, $topic, $item, $image, $target_file, $description, $remark);

    if ($stmt->execute()) {
        $user_id = $_SESSION['id'];
        log_activity($conn, $user_id, "Open new ticket #: $ticketnum", "Ticket");

        $_SESSION['success'] = "Successful.";
        header("Location: ticket?id=$ticketnum");
        exit();
    } else {
        $_SESSION['error'] = "Failed to open a ticket";
        header("Location: open-ticket");
        exit();
    }
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: open-ticket");
    exit();
}
?>