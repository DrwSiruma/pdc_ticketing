<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'pdc_ticketing_db');
if ($conn->connect_error) {
    echo json_encode(['unread_notif' => 0]);
    exit;
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(['count' => 0]);
    exit();
}

$q = $conn->query("SELECT COUNT(*) AS ticket_count FROM tbl_tickets WHERE status = '1' OR status = '2' OR status = '4'");
$res = $q ? $q->fetch_assoc() : ['ticket_count' => 0];

echo json_encode(['count' => (int)$res['ticket_count']]);
?>