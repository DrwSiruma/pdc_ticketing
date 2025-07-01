<?php
// filepath: d:/Xampp/htdocs/pdc_ticketing/pages/admin/srv-report-data.php
session_start();
require_once '../../includes/connection.php';

// DataTables server-side processing params
$draw = intval($_POST['draw'] ?? 1);
$start = intval($_POST['start'] ?? 0);
$length = intval($_POST['length'] ?? 10);

$date_from = $_POST['date_from'] ?? '';
$date_to = $_POST['date_to'] ?? '';
$department = $_POST['department'] ?? '';
$establishment = trim($_POST['establishment'] ?? '');
$personnel = trim($_POST['personnel'] ?? '');

$where = "WHERE t.status = '5'";
$params = [];
$types = '';

if ($date_from) {
    $where .= " AND DATE(t.date_closed) >= ?";
    $params[] = $date_from;
    $types .= 's';
}
if ($date_to) {
    $where .= " AND DATE(t.date_closed) <= ?";
    $params[] = $date_to;
    $types .= 's';
}
if ($department) {
    $where .= " AND t.designation = ?";
    $params[] = $department;
    $types .= 's';
}
if ($establishment) {
    $where .= " AND u.name LIKE ?";
    $params[] = "%$establishment%";
    $types .= 's';
}
if ($personnel) {
    $where .= " AND a.name LIKE ?";
    $params[] = "%$personnel%";
    $types .= 's';
}

$sql = "SELECT SQL_CALC_FOUND_ROWS t.*, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name
        FROM tbl_tickets t
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        $where
        ORDER BY t.date_closed DESC
        LIMIT ?, ?";

$stmt = $conn->prepare($sql);
if ($params) {
    $types .= 'ii';
    $params[] = $start;
    $params[] = $length;
    $stmt->bind_param($types, ...$params);
} else {
    $stmt->bind_param('ii', $start, $length);
}
$stmt->execute();
$res = $stmt->get_result();

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = [
        'date_closed' => date('Y-m-d', strtotime($row['date_closed'])),
        'ticket_num' => htmlspecialchars($row['ticket_num']),
        'department' => $row['designation'] == 1 ? 'IT' : 'Maintenance',
        'establishment' => htmlspecialchars($row['outlet_name']),
        'category' => htmlspecialchars($row['categ_name']),
        'item' => htmlspecialchars($row['item_name']),
        'personnel' => htmlspecialchars($row['staff_name']),
        'remarks' => htmlspecialchars($row['remark']),
        'actions' => '<a href="view-ticket?id=' . urlencode($row['ticket_num']) . '" class="btn btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i></a> '
            . ($row['designation'] == 1
                ? '<a href="generate-it-report?id=' . urlencode($row['ticket_num']) . '" class="btn btn-sm btn-primary" title="Download IT Report"><i class="fas fa-download"></i></a>'
                : '<a href="generate-maintenance-report?id=' . urlencode($row['ticket_num']) . '" class="btn btn-sm btn-primary" title="Download Maintenance Report"><i class="fas fa-download"></i></a>')
    ];
}

// Get filtered count
$countRes = $conn->query("SELECT FOUND_ROWS() as total");
$recordsFiltered = $countRes->fetch_assoc()['total'];
// Get total count (all closed)
$totalRes = $conn->query("SELECT COUNT(*) as total FROM tbl_tickets WHERE status = '5'");
$recordsTotal = $totalRes->fetch_assoc()['total'];

// DataTables response
echo json_encode([
    'draw' => $draw,
    'recordsTotal' => $recordsTotal,
    'recordsFiltered' => $recordsFiltered,
    'data' => $data
]);
