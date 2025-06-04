<?php 
    include('admin.header.php');
    include('admin.ticket-qry.php');

    // Fetch assigned tickets ordered by priority and schedule
    $TicketsListQuery = "SELECT * FROM tbl_tickets WHERE status NOT IN ('2', '3', '5') ORDER BY FIELD(priority_type, 'P1', 'P2', 'P3', 'P4', 'P5'), sched_start ASC, sched_end ASC";
    $TicketsListResult = mysqli_query($conn, $TicketsListQuery);
    $TicketsList = [];
    if ($TicketsListResult && mysqli_num_rows($TicketsListResult) > 0) {
        while ($ticket = mysqli_fetch_assoc($TicketsListResult)) {
            $TicketsList[] = $ticket;
        }
    } else {
        $TicketsListResult = false; // handle the error as needed
    }


    // Fetch overdue tickets
    $overdueTickets = [];
    $current_date = new DateTime();
    foreach ($TicketsList as $ticket) {
        if (!empty($ticket['sched_end']) && $ticket['sched_end'] !== 'NULL') {
            $sched_end_date = new DateTime($ticket['sched_end']);
            if ($sched_end_date < $current_date && $ticket['status'] != '5') {
                $overdueTickets[] = $ticket;
            }
        }
    }
    $overdueTicketsCount = count($overdueTickets);
?>
 
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Registered Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $acc_qry = "SELECT COUNT(*) FROM tbl_useraccounts WHERE status='Active' AND id != '1'";
                                        $result = mysqli_query($conn, $acc_qry) or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($result)) {
                                            if($row[0] <= 0) {
                                                echo "0";
                                            }
                                            else {
                                                echo "$row[0]";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pending Ticket(s)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_count;?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sticky-note fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Opened Ticket(s)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $open_count;?></div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Overdue Ticket(s)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overdue_count; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-times fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
                <div class="card mb-4 h-100" style="max-height:510px; height:510px;">
                    <div class="card-header bg-dark fw-bold text-light">
                        <i class="fas fa-gear"></i>&nbsp;System Logs
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm w-100" id="syslogtbl">
                                <thead class="bg-secondary text-light">
                                    <th>User</th>
                                    <th>Activity</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                <?php
                                    $adlog_qry = mysqli_query($conn, "SELECT a.*, u.username FROM tbl_auditlog a LEFT JOIN tbl_useraccounts u ON a.user_id = u.id ORDER BY a.date_posted DESC;");
                                    while($adlog_res=mysqli_fetch_array($adlog_qry)){
                                        $createDT = new DateTime($adlog_res["date_posted"]);
                                ?>
                                <tr>
                                    <td><?php echo $adlog_res['username']; ?></td>
                                    <td><?php echo $adlog_res['activity']; ?></td>
                                    <td><?php echo $formattedDate = $createDT->format('m/d/Y - h:i A'); ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-flex flex-column" style="height:510px; max-height:510px;">
                <div class="row">
                    <div class="col-12 d-flex flex-column mb-4">
                        <div class="card shadow-sm border-0 w-100 d-flex flex-column" style="height:100%;">
                            <div class="card-header bg-white fw-bold"><i class="fas fa-ticket-alt text-primary"></i>&nbsp;Opened Tickets</div>
                            <div class="card-body flex-grow-1 p-0" style="overflow-y:auto; max-height:calc(250px - 56px);">
                                <ul class="list-group" style="border-radius: 0;">
                                    <?php
                                        foreach ($TicketsList as $ticket) { ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span><span style="font-weight: bold;"><?php echo $ticket['ticket_num']; ?></span> - Priority: <span class="badge bg-primary text-light"><?php echo $ticket['priority_type']; ?></span></span>
                                                <span class="text-muted"><?php echo $ticket['sched_start']; ?> → <?php echo $ticket['sched_end']; ?></span>
                                            </li>
                                        <?php }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-column mb-4">
                        <div class="card shadow-sm border-0 w-100 d-flex flex-column" style="height:100%;">
                            <div class="card-header bg-white fw-bold"><i class="fas fa-exclamation-triangle text-danger"></i>&nbsp;Overdue Tickets</div>
                            <div class="card-body flex-grow-1 p-0" style="overflow-y:auto; max-height:calc(250px - 56px);">
                                <ul class="list-group" style="border-radius: 0;">
                                    <?php
                                        if ($overdueTicketsCount > 0) {
                                            foreach ($overdueTickets as $ticket) {
                                                echo "<li class=\"list-group-item d-flex justify-content-between align-items-center\"><span style=\"font-weight: bold;\">" . $ticket['ticket_num'] . "</span>&nbsp;<span class=\"badge bg-danger text-light\">Overdue</span>";
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
        </div>
    </div>

<?php include('admin.footer.php'); ?>