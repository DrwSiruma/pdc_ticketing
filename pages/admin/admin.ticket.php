<?php 
    include('admin.header.php');
    include('admin.ticket-qry.php')
?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ticket Request</h1>
        </div>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <!-- Tabs navs -->
        <ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist">
            <li class="nav-item position-relative" role="presentation">
                <a href="ticket?tab=pending" class="nav-link active" id="ex-with-icons-tab-1" data-toggle="pill" data-target="#ex-with-icons-tabs-1" role="tab" aria-controls="ex-with-icons-tabs-1" aria-selected="true">
                    <i class="far fa-clock fa-fw me-2"></i>Pending</a>
                </a>

                <?php if ($pending_count > 0) { ?>
                    <span class="position-absolute" 
                        style="top: -4%; right: -1%; width: 12px; height: 12px; background-color: red; border-radius: 50%; border: 2px solid white;">
                    </span>
                <?php } ?>
            </li>
            <li class="nav-item position-relative" role="presentation">
                <a href="ticket?tab=open" class="nav-link" id="ex-with-icons-tab-2" data-toggle="pill" data-target="#ex-with-icons-tabs-2" role="tab"
                aria-controls="ex-with-icons-tabs-2" aria-selected="false">
                    <i class="fas fa-folder-open fa-fw me-2"></i>Open
                </a>

                <?php if ($open_count > 0) { ?>
                    <span class="position-absolute" 
                        style="top: -4%; right: -1%; width: 12px; height: 12px; background-color: red; border-radius: 50%; border: 2px solid white;">
                    </span>
                <?php } ?>
            </li>
            <li class="nav-item position-relative" role="presentation">
                <a href="ticket?tab=overdue" class="nav-link" id="ex-with-icons-tab-3" data-toggle="pill" data-target="#ex-with-icons-tabs-3" role="tab" aria-controls="ex-with-icons-tabs-3" aria-selected="false"><i class="fas fa-calendar-times fa-fw me-2"></i>Overdue</a>

                <?php if ($overdue_count > 0) { ?>
                    <span class="position-absolute" 
                        style="top: -4%; right: -1%; width: 12px; height: 12px; background-color: red; border-radius: 50%; border: 2px solid white;">
                    </span>
                <?php } ?>
            </li>
            <li class="nav-item" role="presentation">
                <a href="ticket?tab=closed" class="nav-link" id="ex-with-icons-tab-4" data-toggle="pill" data-target="#ex-with-icons-tabs-4" role="tab" aria-controls="ex-with-icons-tabs-4" aria-selected="false"><i class="fas fa-folder fa-fw me-2"></i>Closed</a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="ticket?tab=rejected" class="nav-link" id="ex-with-icons-tab-5" data-toggle="pill" data-target="#ex-with-icons-tabs-5" role="tab" aria-controls="ex-with-icons-tabs-5" aria-selected="false"><i class="fas fa-times-circle fa-fw me-2"></i>Rejected</a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex-with-icons-content">
            <!-- Pending Tab -->
            <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="pending_tbl">
                        <thead>
                            <tr>
                                <th>Post Date</th>
                                <th>Ticket #</th>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will populate this via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Open Tab -->
            <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="open_tbl">
                        <thead>
                            <tr>
                                <th hidden>Post Date</th>
                                <th>Ticket #</th>
                                <th>Subject</th>
                                <th>From</th>
                                <th>Priority</th>
                                <th>Schedule</th>
                                <th>Assigned to</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will populate this via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Overdue Tab -->
            <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="overdues_tbl">
                        <thead>
                            <tr>
                                <th hidden>Post Date</th>
                                <th>Ticket #</th>
                                <th>Subject</th>
                                <th>From</th>
                                <th>Priority</th>
                                <th>Schedule</th>
                                <th>Assigned to</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will populate this via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Closed Tab -->
            <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="close_tbl">
                        <thead>
                            <tr>
                                <th hidden>Post Date</th>
                                <th>Ticket #</th>
                                <th>Subject</th>
                                <th>From</th>
                                <th>Assigned to</th>
                                <th>Date Closed</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will populate this via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Reject Tab -->
            <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="reject_tbl">
                        <thead>
                            <tr>
                                <th>Post Date</th>
                                <th>Ticket #</th>
                                <th>Subject</th>
                                <th>From</th>
                                <th>Remarks</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will populate this via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tabs content -->

    </div>

<script src="jquery3.6"></script>
<script src="../../assets/js/tab.admin.js"></script>
<script>
    function fetchAndUpdateTickets() {
        // Pending Tickets
        var pendingTable = $('#pending_tbl').DataTable({
            ajax: {
                url: 'admin.ticket-data.php',
                data: { type: 'pending' },
                dataSrc: 'pending'
            },
            columns: [
                { data: 'date_posted' },
                { data: 'ticket_num' },
                { data: 'from' },
                { data: 'subject' },
                { data: 'designation' },
                { data: 'actions' }
            ],
            language: {
                emptyTable: '<i>No Available Data on this Table</i>'
            },
            order: [[0, 'desc']]
        });

        // Open Tickets
        var openTable = $('#open_tbl').DataTable({
            ajax: {
                url: 'admin.ticket-data.php',
                data: { type: 'open' },
                dataSrc: 'open'
            },
            columns: [
                { data: 'date_posted', visible: false },
                { data: 'ticket_num' },
                { data: 'subject' },
                { data: 'from' },
                { data: 'priority' },
                { data: 'schedule' },
                { data: 'assigned_to' },
                { data: 'last_modified' },
                { data: 'actions' }
            ],
            language: {
                emptyTable: '<i>No Available Data on this Table</i>'
            },
            order: [[0, 'desc']]
        });

        // Overdue Tickets
        var overdueTable = $('#overdues_tbl').DataTable({
            ajax: {
                url: 'admin.ticket-data.php',
                data: { type: 'overdue' },
                dataSrc: 'overdue'
            },
            columns: [
                { data: 'date_posted', visible: false },
                { data: 'ticket_num' },
                { data: 'subject' },
                { data: 'from' },
                { data: 'priority' },
                { data: 'schedule' },
                { data: 'assigned_to' },
                { data: 'last_modified' },
                { data: 'actions' }
            ],
            language: {
                emptyTable: '<i>No Available Data on this Table</i>'
            },
            order: [[0, 'desc']]
        });

        // Closed Tickets
        var closeTable = $('#close_tbl').DataTable({
            ajax: {
                url: 'admin.ticket-data.php',
                data: { type: 'closed' },
                dataSrc: 'closed'
            },
            columns: [
                { data: 'date_posted', visible: false },
                { data: 'ticket_num' },
                { data: 'subject' },
                { data: 'from' },
                { data: 'assigned_to' },
                { data: 'date_closed' },
                { data: 'actions' }
            ],
            language: {
                emptyTable: '<i>No Available Data on this Table</i>'
            },
            order: [[0, 'desc']]
        });

        // Rejected Tickets
        var rejectTable = $('#reject_tbl').DataTable({
            ajax: {
                url: 'admin.ticket-data.php',
                data: { type: 'rejected' },
                dataSrc: 'rejected'
            },
            columns: [
                { data: 'date_posted' },
                { data: 'ticket_num' },
                { data: 'subject' },
                { data: 'from' },
                { data: 'remarks' },
                { data: 'last_modified' },
                { data: 'actions' }
            ],
            language: {
                emptyTable: '<i>No Available Data on this Table</i>'
            },
            order: [[0, 'desc']]
        });
    
        // Auto-refresh every 2 seconds
        setInterval(function() {
            pendingTable.ajax.reload(null, false);
            openTable.ajax.reload(null, false);
            overdueTable.ajax.reload(null, false);
            closeTable.ajax.reload(null, false);
            rejectTable.ajax.reload(null, false);
        }, 2000);
    }

    $(document).ready(function() {
        fetchAndUpdateTickets();
    });
</script>
<?php include('admin.footer.php'); ?>