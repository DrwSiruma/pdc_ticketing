<?php
include('staff.header.php');

// Fetch total assigned tickets
$assignedTicketsQuery = "SELECT COUNT(*) as total_assigned FROM tbl_tickets WHERE assigned = '{$_SESSION['id']}'";
$assignedTicketsResult = mysqli_query($conn, $assignedTicketsQuery);
if ($assignedTicketsResult) {
    $assignedTickets = mysqli_fetch_assoc($assignedTicketsResult)['total_assigned'];
} else {
    $assignedTickets = 0; // or handle the error as needed
}

// Fetch total resolved tickets for this month
$resolvedTicketsQuery = "SELECT COUNT(*) as total_resolved FROM tbl_tickets WHERE assigned = '{$_SESSION['id']}' AND status = '5' AND MONTH(date_closed) = MONTH(CURRENT_DATE()) AND YEAR(date_closed) = YEAR(CURRENT_DATE())";
$resolvedTicketsResult = mysqli_query($conn, $resolvedTicketsQuery);
if ($resolvedTicketsResult) {
    $resolvedTickets = mysqli_fetch_assoc($resolvedTicketsResult)['total_resolved'];
} else {
    $resolvedTickets = 0; // or handle the error as needed
}

// Fetch assigned tickets ordered by priority and schedule
$assignedTicketsListQuery = "SELECT * FROM tbl_tickets WHERE assigned = '{$_SESSION['id']}' ORDER BY FIELD(priority_type, 'P1', 'P2', 'P3', 'P4', 'P5'), sched_start ASC, sched_end ASC";
$assignedTicketsListResult = mysqli_query($conn, $assignedTicketsListQuery);
$assignedTicketsList = [];
if ($assignedTicketsListResult && mysqli_num_rows($assignedTicketsListResult) > 0) {
    while ($ticket = mysqli_fetch_assoc($assignedTicketsListResult)) {
        $assignedTicketsList[] = $ticket;
    }
} else {
    $assignedTicketsListResult = false; // handle the error as needed
}

// Fetch overdue tickets
$overdueTickets = [];
$current_date = new DateTime();
foreach ($assignedTicketsList as $ticket) {
    if (!empty($ticket['sched_end']) && $ticket['sched_end'] !== 'NULL') {
        $sched_end_date = new DateTime($ticket['sched_end']);
        if ($sched_end_date < $current_date && $ticket['status'] != '5') {
            $overdueTickets[] = $ticket;
        }
    }
}
$overdueTicketsCount = count($overdueTickets);
?>

<div class="container my-5">
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color:#fff;">
            <div>
                <h4>Dashboard</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Total Assigned Tickets</h5>
                            <p class="card-text"><?php echo $assignedTickets; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Total Resolved Tickets (This Month)</h5>
                            <p class="card-text"><?php echo $resolvedTickets; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Overdue Tickets</h5>
                            <p class="card-text">
                                <?php
                                if ($overdueTicketsCount > 0) {
                                    foreach ($overdueTickets as $ticket) {
                                        echo "Ticket ID: " . $ticket['ticket_num'] . "<br>";
                                    }
                                } else {
                                    echo "No overdue assigned tasks";
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <h5>Assigned Tickets (Ordered by Priority and Schedule)</h5>
            <ul class="list-group">
                <?php
                foreach ($assignedTicketsList as $ticket) {
                    echo "<li class='list-group-item'>Ticket Number: " . $ticket['ticket_num'] . " - Priority: " . $ticket['priority_type'] . ", Schedule: " . $ticket['sched_start'] . " to " . $ticket['sched_end'] . "</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php include('staff.footer.php'); ?>