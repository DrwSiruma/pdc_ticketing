<?php
session_start();
header('Content-Type: application/json');

include('../includes/connection.php');

if (!isset($_SESSION['id'])) {
    echo json_encode(['notifications' => []]);
    exit;
}

$user_id = $_SESSION['id'];
$notif_qry = mysqli_query($conn, "SELECT * FROM `tbl_notif` WHERE user_id = $user_id ORDER BY post_date DESC");
$notifications = [];
if ($notif_qry) {
    while($notif_row = mysqli_fetch_assoc($notif_qry)) {
        $notifications[] = [
            'id' => $notif_row['id'],
            'msg' => $notif_row['notif_msg'],
            'status' => $notif_row['status'],
            'date' => date('M d, Y h:i A', strtotime($notif_row['post_date']))
        ];
    }
}
echo json_encode(['notifications' => $notifications]);
?>