<?php 
    include('staff.header.php');
    include('staff.ticket-qry.php');
?>
    <div class="container my-5">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color:#fff;">
                <div>
                    <h4>Tickets</h4>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <!-- Tabs navs -->
                <ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist">
                    <li class="nav-item position-relative" role="presentation">
                        <a href="ticket?tab=open" class="nav-link active" id="ex-with-icons-tab-1" data-toggle="pill" data-target="#ex-with-icons-tabs-1" role="tab"
                        aria-controls="ex-with-icons-tabs-1" aria-selected="false">
                            <i class="fas fa-folder-open fa-fw me-2"></i>Open
                        </a>

                        <?php if ($open_count > 0) { ?>
                            <span class="position-absolute" 
                                style="top: -4%; right: -1%; width: 12px; height: 12px; background-color: red; border-radius: 50%; border: 2px solid white;">
                            </span>
                        <?php } ?>
                    </li>
                    <li class="nav-item position-relative" role="presentation">
                        <a href="ticket?tab=overdue" class="nav-link" id="ex-with-icons-tab-2" data-toggle="pill" data-target="#ex-with-icons-tabs-2" role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-calendar-times fa-fw me-2"></i>Overdue</a>

                        <?php if ($overdue_count > 0) { ?>
                            <span class="position-absolute" 
                                style="top: -4%; right: -1%; width: 12px; height: 12px; background-color: red; border-radius: 50%; border: 2px solid white;">
                            </span>
                        <?php } ?>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="ticket?tab=closed" class="nav-link" id="ex-with-icons-tab-3" data-toggle="pill" data-target="#ex-with-icons-tabs-3" role="tab" aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-folder fa-fw me-2"></i>Closed</a>
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex-with-icons-content">
                    <!-- Open Tab -->
                    <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm w-100" id="opentkt_tbl">
                                <thead>
                                    <tr>
                                        <th hidden>Post Date</th>
                                        <th>Ticket #</th>
                                        <th>Subject</th>
                                        <th>From</th>
                                        <th>Priority</th>
                                        <th>Schedule</th>
                                        <th>Last Modified</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="open-tickets-body">
                                    <!--  -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Overdue Tab -->
                    <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm w-100" id="overduetkt_tbl">
                                <thead>
                                    <tr>
                                        <th hidden>Post Date</th>
                                        <th>Ticket #</th>
                                        <th>Subject</th>
                                        <th>From</th>
                                        <th>Priority</th>
                                        <th>Schedule</th>
                                        <th>Last Modified</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="overdue-tickets-body">
                                    <!--  -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Closed Tab -->
                    <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm w-100" id="closetkt_tbl">
                                <thead>
                                    <tr>
                                        <th hidden>Post Date</th>
                                        <th>Ticket #</th>
                                        <th>Subject</th>
                                        <th>From</th>
                                        <th>Date Closed</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="closed-tickets-body">
                                    <!--  -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Tabs content -->
            </div>
        </div>
    </div>
    <script src="../../assets/js/tab.staff.js"></script>
    <script src="jquery3.6"></script>
    <script>
        function fetchAndUpdateTickets() {
                // Open tickets
                var openTable = $('#opentkt_tbl').DataTable({
                    ajax: {
                        url: 'ticket-data',
                        dataSrc: 'open'
                    },
                    columns: [
                        { data: 'date_posted', visible: false },
                        { data: 'ticket_num' },
                        { data: 'subject' },
                        { data: 'from' },
                        { data: 'priority' },
                        { data: 'schedule' },
                        { data: 'last_modified' },
                        { data: 'actions' }
                    ],
                    language: {
                        emptyTable: "<i>No Available Data on this Table</i>"
                    }
                });

                // Overdue tickets
                var overdueTable = $('#overduetkt_tbl').DataTable({
                    ajax: {
                        url: 'ticket-data',
                        dataSrc: 'overdue'
                    },
                    columns: [
                        { data: 'date_posted', visible: false },
                        { data: 'ticket_num' },
                        { data: 'subject' },
                        { data: 'from' },
                        { data: 'priority' },
                        { data: 'schedule' },
                        { data: 'last_modified' },
                        { data: 'actions' }
                    ],
                    language: {
                        emptyTable: "<i>No Available Data on this Table</i>"
                    }
                });

                // Closed tickets
                var closeTable = $('#closetkt_tbl').DataTable({
                    ajax: {
                        url: 'ticket-data',
                        dataSrc: 'closed'
                    },
                    columns: [
                        { data: 'date_posted', visible: false },
                        { data: 'ticket_num' },
                        { data: 'subject' },
                        { data: 'from' },
                        { data: 'date_closed' },
                        { data: 'actions' }
                    ],
                    language: {
                        emptyTable: "<i>No Available Data on this Table</i>"
                    }
                });

                // Auto-refresh every 2 seconds
                setInterval(function() {
                    openTable.ajax.reload(null, false); // false = keep current page
                    overdueTable.ajax.reload(null, false);
                    closeTable.ajax.reload(null, false);
                }, 2000);
        }

        $(document).ready(function() {
            fetchAndUpdateTickets();
        });
    </script>
<?php include('staff.footer.php'); ?>