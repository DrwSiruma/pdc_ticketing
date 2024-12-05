<?php

$all_tickets = mysqli_query($conn, "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        ORDER BY t.date_posted DESC");

$pending_tickets = [];
$open_tickets = [];
$overdue_tickets = [];
$closed_tickets = [];
$rejected_tickets = [];

while ($rows = mysqli_fetch_array($all_tickets)) {
    if ($rows['ticket_status'] == '2') { // Pending
        $pending_tickets[] = $rows;
    } elseif ($rows['ticket_status'] == '1') { // Open
        $open_tickets[] = $rows;
    } elseif ($rows['ticket_status'] == '3') { // Rejected
        $rejected_tickets[] = $rows;
    } elseif ($rows['ticket_status'] == '5') { // Closed
        $closed_tickets[] = $rows;
    } elseif ($rows['sched'] < date('Y-m-d H:i:s') && $rows['ticket_status'] != '5') { // Overdue
        $overdue_tickets[] = $rows;
    }
}

// Initialize counters for each category
$pending_count = count($pending_tickets);
$open_count = count($open_tickets);
$overdue_count = count($overdue_tickets);

?>