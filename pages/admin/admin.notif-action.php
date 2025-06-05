<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'pdc_ticketing_db');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

// Debug: Log incoming data and session
// file_put_contents(__DIR__ . '/notif_action_debug.log', date('Y-m-d H:i:s') . "\n" . print_r([
//     'session' => $_SESSION,
//     'data' => $data
// ], true), FILE_APPEND);

if (isset($data['action'])) {
    if ($data['action'] === 'mark_read' && isset($data['id'])) {
        // Mark a single notification as read
        $notif_id = intval($data['id']);
        $stmt = $conn->prepare("UPDATE tbl_notif SET status = '0' WHERE id = ?");
        $stmt->bind_param('i', $notif_id);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['success' => true]);
        exit();
    } elseif ($data['action'] === 'mark_all_read') {
        // Mark all notifications as read for this admin
        $admin_id = $_SESSION['id'];
        $stmt = $conn->prepare("UPDATE tbl_notif SET status = '0' WHERE user_id = ?");
        $stmt->bind_param('i', $admin_id);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['success' => true]);
        exit();
    }
}

echo json_encode(['success' => false, 'error' => 'Invalid request']);
?>