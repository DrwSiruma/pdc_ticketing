<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'pdc_ticketing_db');
if ($conn->connect_error) {
    echo json_encode(['unread_notif' => 0]);
    exit;
}

// Get the current user's ID (adjust according to your session/user system)
$user_id = $_SESSION['id'] ?? 0;
// Query for unread notifications
$sql = "SELECT COUNT(*) as unread FROM tbl_notif WHERE user_id = ? AND status = '1'";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

echo json_encode(['unread_notif' => $result['unread'] ?? 0]);

$stmt->close();
$conn->close();
?>