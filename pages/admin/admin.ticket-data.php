<?php
session_start();
header('Content-Type: application/json');
require_once '../../includes/connection.php';

date_default_timezone_set('Asia/Manila');

function formatSchedule($start, $end) {
    $startDate = new DateTime($start);
    $endDate = new DateTime($end);
    if ($startDate->format('Y-m-d') === $endDate->format('Y-m-d')) {
        return $startDate->format('F j, Y');
    }
    if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
        return $startDate->format('F j') . '-' . $endDate->format('j, Y');
    }
    if ($startDate->format('Y') === $endDate->format('Y')) {
        return $startDate->format('F j') . ' - ' . $endDate->format('F j, Y');
    }
    return $startDate->format('F j, Y') . ' - ' . $endDate->format('F j, Y');
}

$pending = [];
$open = [];
$overdue = [];
$closed = [];
$rejected = [];

// Pending tickets
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.status = '2' ORDER BY t.date_posted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tickets = $stmt->get_result();
while ($row = $tickets->fetch_assoc()) {
    $pending[] = [
        'date_posted' => date('m/d/Y - h:i A', strtotime($row['date_posted'])),
        'ticket_num' => '<span style="font-weight:500">' . htmlspecialchars($row['ticket_num']) . '</span>',
        'from' => htmlspecialchars($row['outlet_name']),
        'subject' => htmlspecialchars($row['categ_name']) . ' - ' . htmlspecialchars($row['item_name']),
        'designation' => $row['designation'] == 1 ? "<span class='bg-info text-dark px-2 rounded'>IT</span>" : "<span class='bg-warning text-dark px-2 rounded'>Maintenance</span>",
        'actions' => '<a href="view-ticket?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>'
    ];
}
$stmt->close();

// Open tickets
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE (t.status = '1' OR t.status = '4') ORDER BY t.date_posted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tickets = $stmt->get_result();
while ($row = $tickets->fetch_assoc()) {
    $action = '<a href="view-ticket?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>';
    if ($row['rprt'] == 1) {
         if ($row['designation'] == 1) {
            $action .= ' <a href="generate-it-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-primary" title="Download IT Report"><i class="fas fa-download"></i></a>';
        } elseif ($row['designation'] == 2) {
            $action .= ' <a href="generate-maintenance-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-primary" title="Download Maintenance Report"><i class="fas fa-download"></i></a>';
        }
    } elseif ($row['rprt'] == 0) {
        $action .= ' <a href="edit-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>';
    }
    $open[] = [
        'date_posted' => '<span hidden>' . date('m/d/Y - h:i A', strtotime($row['date_posted'])) . '</span>',
        'ticket_num' => htmlspecialchars($row['ticket_num']),
        'subject' => htmlspecialchars($row['categ_name']) . ' - ' . htmlspecialchars($row['item_name']),
        'from' => htmlspecialchars($row['outlet_name']),
        'priority' => htmlspecialchars($row['priority_type']),
        'schedule' => ($row['sched_end'] < date('Y-m-d H:i:s')) ? '<span class="text-danger">'.formatSchedule($row['sched_start'],$row['sched_end']).'</span>' : formatSchedule($row['sched_start'],$row['sched_end']),
        'assigned_to' => htmlspecialchars($row['staff_name']),
        'last_modified' => date('m-d-Y - h:i A', strtotime($row['date_modified'])),
        'actions' => $action
    ];
}
$stmt->close();

// Overdue tickets
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.sched_end IS NOT NULL AND t.sched_end <> '' AND t.sched_end < NOW() AND t.status != '5' ORDER BY t.date_posted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tickets = $stmt->get_result();
while ($row = $tickets->fetch_assoc()) {
    $action = '<a href="view-ticket?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>';
    if ($row['rprt'] == 1) {
        if ($row['designation'] == 1) {
            $action .= ' <a href="generate-it-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-primary" title="Download IT Report"><i class="fas fa-download"></i></a>';
        } elseif ($row['designation'] == 2) {
            $action .= ' <a href="generate-maintenance-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-primary" title="Download Maintenance Report"><i class="fas fa-download"></i></a>';
        }
    } elseif ($row['rprt'] == 0) {
        $action .= ' <a href="edit-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>';
    }
    $overdue[] = [
        'date_posted' => '<span hidden>' . date('m/d/Y - h:i A', strtotime($row['date_posted'])) . '</span>',
        'ticket_num' => htmlspecialchars($row['ticket_num']),
        'subject' => htmlspecialchars($row['categ_name']) . ' - ' . htmlspecialchars($row['item_name']),
        'from' => htmlspecialchars($row['outlet_name']),
        'priority' => htmlspecialchars($row['priority_type']),
        'schedule' => ($row['sched_end'] < date('Y-m-d H:i:s')) ? '<span class="text-danger">'.formatSchedule($row['sched_start'],$row['sched_end']).'</span>' : formatSchedule($row['sched_start'],$row['sched_end']),
        'assigned_to' => htmlspecialchars($row['staff_name']),
        'last_modified' => date('m-d-Y - h:i A', strtotime($row['date_modified'])),
        'actions' => $action
    ];
}
$stmt->close();

// Closed tickets
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.status = '5' ORDER BY t.date_closed DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tickets = $stmt->get_result();
while ($row = $tickets->fetch_assoc()) {
    $action = '<a href="view-ticket?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>';
    if ($row['rprt'] == 1) {
         if ($row['designation'] == 1) {
            $action .= ' <a href="generate-it-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-primary" title="Download IT Report"><i class="fas fa-download"></i></a>';
        } elseif ($row['designation'] == 2) {
            $action .= ' <a href="generate-maintenance-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-primary" title="Download Maintenance Report"><i class="fas fa-download"></i></a>';
        }
    } elseif ($row['rprt'] == 0) {
        $action .= ' <a href="edit-report?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>';
    }
    $closed[] = [
        'date_posted' => '<span hidden>' . date('m/d/Y - h:i A', strtotime($row['date_posted'])) . '</span>',
        'ticket_num' => htmlspecialchars($row['ticket_num']),
        'subject' => htmlspecialchars($row['categ_name']) . ' - ' . htmlspecialchars($row['item_name']),
        'from' => htmlspecialchars($row['outlet_name']),
        'assigned_to' => htmlspecialchars($row['staff_name']),
        'date_closed' => date('m-d-Y - h:i A', strtotime($row['date_closed'])),
        'actions' => $action
    ];
}
$stmt->close();

// Rejected tickets
$sql = "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.status = '3' ORDER BY t.date_modified DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$tickets = $stmt->get_result();
while ($row = $tickets->fetch_assoc()) {
    $rejected[] = [
        'date_posted' => date('m/d/Y - h:i A', strtotime($row['date_posted'])),
        'ticket_num' => htmlspecialchars($row['ticket_num']),
        'subject' => htmlspecialchars($row['categ_name']) . ' - ' . htmlspecialchars($row['item_name']),
        'from' => htmlspecialchars($row['outlet_name']),
        'remarks' => htmlspecialchars($row['remark']),
        'last_modified' => date('m-d-Y - h:i A', strtotime($row['date_modified'])),
        'actions' => '<a href="view-ticket?id=' . urlencode($row['ticket_num']) . '" class="btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i> View</a>'
    ];
}
$stmt->close();

echo json_encode([
    'pending' => $pending,
    'open' => $open,
    'overdue' => $overdue,
    'closed' => $closed,
    'rejected' => $rejected
]);
