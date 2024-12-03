<?php
include('../includes/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketnum  = trim($_POST['ticket']);
    $user_id = $_SESSION['id'];

    $result = $conn->query("SELECT id, ticket_num FROM tbl_tickets WHERE ticket_num LIKE '$ticketnum' AND outlet = '$user_id' ORDER BY ticket_num DESC LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ticketid = $row['id'];
        header("Location: my-ticket?id=$ticketid");
        exit();
    } else {
        $_SESSION['error'] = "The entered tickect number is invalid. Please provide a valid ticket number.";
        header("Location: track-ticket");
        exit();
    }
    
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: track-ticket");
    exit();
}
?>