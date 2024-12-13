<?php 
    include('admin.header.php');
    include('admin.ticket-qry.php')
?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ticket Request</h1>
        </div>

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
            <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="pendingtck_tbl">
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
                            <?php
                                foreach ($pending_tickets as $rows) {
                                    $postDT = new DateTime($rows["date_posted"]);
                            ?>
                            <tr>
                                <td><?php echo $postDT->format('m/d/Y - h:i A'); ?></td>
                                <td style="font-weight: 500;"><?php echo $rows['ticket_num']; ?></td>
                                <td><?php echo $rows['outlet_name']; ?></td>
                                <td><?php echo $rows['categ_name'] . ' - ' . $rows['item_name']; ?></td>
                                <?php echo $rows['designation'] == 1 ? "<td class='bg-info text-dark'>IT</td>" : "<td class='bg-warning text-dark'>Maintenance</td>"; ?>
                                <td>
                                    <a href="view-ticket?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>
                                    <!-- <a href="#" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a> -->
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="opentck_tbl">
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
                            <?php
                                foreach ($open_tickets as $rows) {
                                    $postDT = new DateTime($rows["date_posted"]);
                                    $modDT = new DateTime($rows["date_modified"]);
                            ?>
                            <tr>
                                <td hidden><?php echo $postDT->format('m/d/Y - h:i A'); ?></td>
                                <td><?php echo $rows['ticket_num']; ?></td>
                                <td><?php echo $rows['categ_name'] . ' - ' . $rows['item_name']; ?></td>
                                <td><?php echo $rows['outlet_name']; ?></td>
                                <td><?php echo $rows['priority_type']; ?></td>
                                <td><?php echo formatSchedule($rows['sched_start'], $rows['sched_end']); ?></td>
                                <td><?php echo $rows['staff_name']; ?></td>
                                <td><?php echo $modDT->format('m-d-Y - h:i A'); ?></td>
                                <td>
                                    <a href="#" class="btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="overdue_tbl">
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
                            <?php
                                foreach ($overdue_tickets as $rows) {
                                    $postDT = new DateTime($rows["date_posted"]);
                                    $modDT = new DateTime($rows["date_modified"]);
                            ?>
                            <tr>
                                <td hidden><?php echo $postDT->format('m/d/Y - h:i A'); ?></td>
                                <td><?php echo $rows['ticket_num']; ?></td>
                                <td><?php echo $rows['categ_name'] . ' - ' . $rows['item_name']; ?></td>
                                <td><?php echo $rows['outlet_name']; ?></td>
                                <td><?php echo $rows['priority_type']; ?></td>
                                <td><?php echo formatSchedule($rows['sched_start'], $rows['sched_end']); ?></td>
                                <td><?php echo $rows['assigned']; ?></td>
                                <td><?php echo $modDT->format('m-d-Y - h:i A'); ?></td>
                                <td>
                                    <a href="#" class="btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="ex-with-icons-tabs-4" role="tabpanel" aria-labelledby="ex-with-icons-tab-4">
                Tab 4 content
            </div>
            <div class="tab-pane fade" id="ex-with-icons-tabs-5" role="tabpanel" aria-labelledby="ex-with-icons-tab-5">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="rejtck_tbl">
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
                            <?php
                                foreach ($rejected_tickets as $rows) {
                                    $postDT = new DateTime($rows["date_posted"]);
                                    $modDT = new DateTime($rows["date_modified"]);
                            ?>
                            <tr>
                                <td><?php echo $postDT->format('m/d/Y - h:i A'); ?></td>
                                <td><?php echo $rows['ticket_num']; ?></td>
                                <td><?php echo $rows['categ_name'] . ' - ' . $rows['item_name']; ?></td>
                                <td><?php echo $rows['outlet_name']; ?></td>
                                <td><?php echo $rows['remark']; ?></td>
                                <td><?php echo $modDT->format('m-d-Y - h:i A'); ?></td>
                                <td>
                                    <a href="view-ticket?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i> View</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Tabs content -->

    </div>

<script src="../../assets/js/tab.admin.js"></script>
<?php include('admin.footer.php'); ?>