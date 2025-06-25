<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'pdc_ticketing_db');
if ($conn->connect_error) {
    echo json_encode(['unread_notif' => 0, 'notifications' => []]);
    exit;
}

$user_id = $_SESSION['id'] ?? 0;

// Get unread count
$sql = "SELECT COUNT(*) as unread FROM tbl_notif WHERE user_id = ? AND status = '1'";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$unread = $result['unread'] ?? 0;
$stmt->close();

// Get latest notifications (limit 10)
$sql2 = "SELECT id, notif_msg, status, post_date FROM tbl_notif WHERE user_id = ? ORDER BY post_date DESC LIMIT 10";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param('i', $user_id);
$stmt2->execute();
$res2 = $stmt2->get_result();

$notifications = [];
while ($row = $res2->fetch_assoc()) {
    $notifications[] = [
        'id' => $row['id'],
        'message' => $row['notif_msg'],
        'time' => $row['post_date'],
        'is_unread' => $row['status'] == '1' ? true : false
    ];
}
$stmt2->close();
$conn->close();

echo json_encode([
    'unread_notif' => $unread,
    'notifications' => $notifications
]);
?>