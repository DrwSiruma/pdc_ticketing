<?php
session_start();
header('Content-Type: application/json');

include('../includes/connection.php');

if (!isset($_SESSION['id'])) {
    echo json_encode(['unread_notif' => 0]);
    exit;
}

$user_id = $_SESSION['id'];

// Query for unread notifications for this staff user
$sql = "SELECT COUNT(*) as unread FROM tbl_notif WHERE user_id = ? AND status = '1'";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$unread = $result['unread'] ?? 0;
$stmt->close();
$conn->close();

echo json_encode(['unread_notif' => $unread]);
?>