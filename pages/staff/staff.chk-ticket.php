<?php
session_start();
header('Content-Type: application/json');

include('../includes/connection.php');

if (!isset($_SESSION['id'])) {
    echo json_encode(['ticket_count' => 0]);
    exit;
}

$user_id = $_SESSION['id'];

// Query for open or pending tickets assigned to this staff
$sql = "SELECT COUNT(*) as ticket_count FROM tbl_tickets WHERE (status = '1' OR status = '4') AND assigned = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
$count = $result['ticket_count'] ?? 0;
$stmt->close();
$conn->close();

echo json_encode(['ticket_count' => $count]);
?>
