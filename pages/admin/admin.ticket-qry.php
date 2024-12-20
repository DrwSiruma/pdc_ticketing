<?php
date_default_timezone_set('Asia/Manila');
$all_tickets = mysqli_query($conn, "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        ORDER BY t.date_posted DESC");

$pending_tickets = [];
$open_tickets = [];
$overdue_tickets = [];
$closed_tickets = [];
$rejected_tickets = [];

while ($rows = mysqli_fetch_array($all_tickets)) {
    // Get the current date and time
    $current_date = new DateTime();
    
    // Check if sched_end is not empty or NULL
    if (!empty($rows['sched_end']) && $rows['sched_end'] !== 'NULL') {
        // Convert sched_end to DateTime for comparison
        $sched_end_date = new DateTime($rows['sched_end']);
        
        // Check if the sched_end is overdue and the status is not Closed (5)
        if ($sched_end_date < $current_date && $rows['ticket_status'] != '5') {
            $overdue_tickets[] = $rows;
        }
    }

    // Categorize tickets based on their status
    if ($rows['ticket_status'] == '2') { // Pending
        $pending_tickets[] = $rows;
    } elseif ($rows['ticket_status'] == '1' || $rows['ticket_status'] == '4') { // Open
        $open_tickets[] = $rows;
    } elseif ($rows['ticket_status'] == '3') { // Rejected
        $rejected_tickets[] = $rows;
    } elseif ($rows['ticket_status'] == '5') { // Closed
        $closed_tickets[] = $rows;
    }
}

// Initialize counters for each category
$pending_count = count($pending_tickets);
$open_count = count($open_tickets);
$overdue_count = count($overdue_tickets);

function formatSchedule($start, $end) {
    $startDate = new DateTime($start);
    $endDate = new DateTime($end);

    // If the start and end dates are the same
    if ($startDate->format('Y-m-d') === $endDate->format('Y-m-d')) {
        return $startDate->format('F j, Y'); // February 12, 2024
    }

    // If the dates are in the same month and year but different days
    if ($startDate->format('Y-m') === $endDate->format('Y-m')) {
        return $startDate->format('F j') . '-' . $endDate->format('j, Y'); // February 12-15, 2024
    }

    // If the dates are in the same year but different months
    if ($startDate->format('Y') === $endDate->format('Y')) {
        return $startDate->format('F j') . ' - ' . $endDate->format('F j, Y'); // February 12 - March 12, 2024
    }

    // If the dates are in different years
    return $startDate->format('F j, Y') . ' - ' . $endDate->format('F j, Y'); // February 12, 2024 - February 12, 2025
}

?>