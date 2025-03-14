<?php
include('staff.header.php');

// Fetch total assigned tickets
$assignedTicketsQuery = "SELECT COUNT(*) as total_assigned FROM tbl_tickets WHERE assigned = '{$_SESSION['id']}' AND STATUS != '5'";
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
$assignedTicketsListQuery = "SELECT * FROM tbl_tickets WHERE assigned = '{$_SESSION['id']}' AND status != '5' ORDER BY FIELD(priority_type, 'P1', 'P2', 'P3', 'P4', 'P5'), sched_start ASC, sched_end ASC";
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
    <div class="row g-4">
        <!-- Total Assigned Tickets -->
        <div class="col-md-6">
            <div class="card shadow-sm text-center p-4 border-0">
                <div class="card-body">
                    <h5 class="fw-bold">Total Assigned Tickets</h5>
                    <h1 class="display-4 text-primary"><?php echo $assignedTickets; ?></h1>
                </div>
            </div>
        </div>
        <!-- Resolved Tickets -->
        <div class="col-md-6">
            <div class="card shadow-sm text-center p-4 border-0">
                <div class="card-body">
                    <h5 class="fw-bold">Resolved Tickets (This Month)</h5>
                    <h1 class="display-4 text-success"><?php echo $resolvedTickets; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Assigned Tickets & Overdue -->
    <div class="row mt-4 g-4">
        <!-- Assigned Tickets List -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold">Assigned Tickets (Ordered by Priority & Schedule)</div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php
                            foreach ($assignedTicketsList as $ticket) { ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span><?php echo $ticket['ticket_num']; ?> - Priority: <span class="badge bg-primary text-light"><?php echo $ticket['priority_type']; ?></span></span>
                                    <span class="text-muted"><?php echo $ticket['sched_start']; ?> → <?php echo $ticket['sched_end']; ?></span>
                                </li>
                            <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Overdue Tickets -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white fw-bold"><i class="fas fa-exclamation-triangle text-danger"></i>&nbsp;Overdue Tickets</div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php
                            if ($overdueTicketsCount > 0) {
                                foreach ($overdueTickets as $ticket) {
                                    echo "<li class=\"list-group-item d-flex justify-content-between align-items-center\">" . $ticket['ticket_num'] . "&nbsp;<span class=\"badge bg-danger text-light\">Overdue</span>";
                                }
                            } else {
                                echo "<i>No overdue assigned tasks</i>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('staff.footer.php'); ?>