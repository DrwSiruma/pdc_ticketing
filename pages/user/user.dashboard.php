<?php 
    include('user.header.php');
    $user_id = $_SESSION['id'];

    // Fetch assigned tickets ordered by priority and schedule
    $TicketsListQuery = "SELECT * FROM tbl_tickets WHERE status NOT IN ('3', '5') AND outlet = $user_id ORDER BY FIELD(priority_type, 'P1', 'P2', 'P3', 'P4', 'P5'), sched_start ASC, sched_end ASC";
    $TicketsListResult = mysqli_query($conn, $TicketsListQuery);
    $TicketsList = [];
    if ($TicketsListResult && mysqli_num_rows($TicketsListResult) > 0) {
        while ($ticket = mysqli_fetch_assoc($TicketsListResult)) {
            $TicketsList[] = $ticket;
        }
    } else {
        $TicketsListResult = false; // handle the error as needed
    }
?>

    <div class="container text-center my-5">
        <h1 class="display-6 font-weight-bold">Welcome to the PDC Support Center</h1>
        <p class="lead">
            In order to streamline support requests and better serve you, we utilize a support ticket system. Every support request is assigned a unique ticket number which you can use to track the progress and responses online. For your reference, we provide complete archives and history of all your support requests. Fill out the form with detailed information to ensure accurate and timely support.
        </p>

        <!-- Buttons -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-3">
                <a href="open-ticket" class="btn btn-primary2 btn-lg btn-block">Open a New Ticket</a>
            </div>
            <div class="col-md-3">
                <a href="track-ticket" class="btn btn-success2 btn-lg btn-block">Check Ticket Status</a>
            </div>
        </div>

        <div class="container-fluid text-left mt-4">
            <div class="row">
                <div class="col-12 d-flex flex-column mb-4">
                    <div class="card shadow-sm border-0 w-100 d-flex flex-column" style="height:100%;">
                        <div class="card-header bg-white fw-bold"><i class="fas fa-ticket-alt text-primary"></i>&nbsp;Active Tickets</div>
                        <div class="card-body flex-grow-1 p-0">
                            <ul class="list-group" style="border-radius: 0;">
                                <?php
                                    foreach ($TicketsList as $ticket) {
                                        if ($ticket['status'] == '2') { ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    <span style="font-weight: bold;"><?php echo $ticket['ticket_num']; ?></span>
                                                    - Pending
                                                </span>
                                            </li>
                                            <?php continue;
                                        } else { ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    <span style="font-weight: bold;"><?php echo $ticket['ticket_num']; ?></span>
                                                    - Priority: <span class="badge bg-primary text-light"><?php echo $ticket['priority_type']; ?></span>
                                                </span>
                                                <span class="text-muted"><?php echo $ticket['sched_start']; ?> → <?php echo $ticket['sched_end']; ?></span>
                                            </li>
                                <?php   }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('user.footer.php'); ?>