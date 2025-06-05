<?php
session_start();
header('Content-Type: application/json');
include('../includes/connection.php');

if (!isset($_SESSION['id'])) {
    echo json_encode(['open'=>[], 'overdue'=>[], 'closed'=>[]]);
    exit;
}

$user_id = $_SESSION['id'];

function formatSchedule($start, $end) {
    return date('m/d/Y h:i A', strtotime($start)) . ' - ' . date('m/d/Y h:i A', strtotime($end));
}

// Open tickets
$open = [];
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE (t.status = '1' OR t.status = '4') AND t.assigned = ?
        ORDER BY t.date_posted DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $open[] = [
        'date_posted' => date('m/d/Y - h:i A', strtotime($row['date_posted'])),
        'ticket_num' => $row['ticket_num'],
        'subject' => $row['categ_name'] . ' - ' . $row['item_name'],
        'from' => $row['outlet_name'],
        'priority' => $row['priority_type'],
        'schedule' => ($row['sched_end'] < date('Y-m-d H:i:s')) ? '<span class="text-danger">'.formatSchedule($row['sched_start'],$row['sched_end']).'</span>' : formatSchedule($row['sched_start'],$row['sched_end']),
        'assigned_to' => $row['staff_name'],
        'last_modified' => date('m-d-Y - h:i A', strtotime($row['date_modified'])),
        'actions' => actionButtons($row)
    ];
}
$stmt->close();

// Overdue tickets
$overdue = [];
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.sched_end < NOW() AND t.status != '5' AND t.assigned = ?
        ORDER BY t.date_posted DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $overdue[] = [
        'date_posted' => date('m/d/Y - h:i A', strtotime($row['date_posted'])),
        'ticket_num' => $row['ticket_num'],
        'subject' => $row['categ_name'] . ' - ' . $row['item_name'],
        'from' => $row['outlet_name'],
        'priority' => $row['priority_type'],
        'schedule' => ($row['sched_end'] < date('Y-m-d H:i:s')) ? '<span class="text-danger">'.formatSchedule($row['sched_start'],$row['sched_end']).'</span>' : formatSchedule($row['sched_start'],$row['sched_end']),
        'assigned_to' => $row['staff_name'],
        'last_modified' => date('m-d-Y - h:i A', strtotime($row['date_modified'])),
        'actions' => actionButtons($row)
    ];
}
$stmt->close();

// Closed tickets
$closed = [];
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.status = '5' AND t.assigned = ?
        ORDER BY t.date_posted DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) {
    $closed[] = [
        'date_posted' => date('m/d/Y - h:i A', strtotime($row['date_posted'])),
        'ticket_num' => $row['ticket_num'],
        'subject' => $row['categ_name'] . ' - ' . $row['item_name'],
        'from' => $row['outlet_name'],
        'assigned_to' => $row['staff_name'],
        'date_closed' => date('m-d-Y - h:i A', strtotime($row['date_closed'])),
        'actions' => actionButtons($row, true)
    ];
}
$stmt->close();
$conn->close();

function actionButtons($row, $closed = false) {
    $btns = '<a href="view-ticket?id='.$row['ticket_num'].'" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a> ';
    if (!$closed) {
        if ($row['rprt'] == 1) {
            $btns .= '<a href="generate-pdf?id='.$row['ticket_num'].'" class="btn-sm btn-primary" title="Download Report"><i class="fas fa-download"></i></a>';
        } elseif ($row['rprt'] == 0) {
            $btns .= '<a href="edit-report?id='.$row['ticket_num'].'" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>';
        }
    } else {
        if ($row['rprt'] == 1) {
            $btns .= '<a href="generate-pdf?id='.$row['ticket_num'].'" class="btn-sm btn-primary" title="Download Report"><i class="fas fa-download"></i></a>';
        } elseif ($row['rprt'] == 0) {
            $btns .= '<a href="edit-report?id='.$row['ticket_num'].'" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>';
        }
    }
    return $btns;
}

echo json_encode([
    'open' => $open,
    'overdue' => $overdue,
    'closed' => $closed
]);
?>