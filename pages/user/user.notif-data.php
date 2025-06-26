<?php
session_start();
include('../includes/connection.php');
header('Content-Type: application/json');

$user_id = $_SESSION['id'];

// Fetch unread notification count
$unread_q = $conn->query("SELECT COUNT(*) AS unread_notif FROM tbl_notif WHERE user_id = $user_id AND status = '1'");
$unread_notif = 0;
if ($unread_q) {
    $row = $unread_q->fetch_assoc();
    $unread_notif = (int)$row['unread_notif'];
}

// Fetch latest notifications (limit 20 for dropdown)
$notif_q = $conn->query("SELECT id, notif_msg, post_date, status FROM tbl_notif WHERE user_id = $user_id ORDER BY post_date DESC LIMIT 20");
$notifications = [];
if ($notif_q) {
    while ($row = $notif_q->fetch_assoc()) {
        $notifications[] = [
            'id' => $row['id'],
            'message' => $row['notif_msg'],
            'time' => date('M d, Y h:i A', strtotime($row['post_date'])),
            'is_unread' => $row['status'] == '1'
        ];
    }
}

echo json_encode([
    'unread_notif' => $unread_notif,
    'notifications' => $notifications
]);
