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
                                        <?php 
                                            if ($rows['sched_end'] < date('Y-m-d H:i:s')) {
                                                echo '<td class="text-danger">' . formatSchedule($rows['sched_start'], $rows['sched_end']) . '</td>';
                                            } else {
                                                echo '<td>' . formatSchedule($rows['sched_start'], $rows['sched_end']) . '</td>';
                                            }
                                        ?>
                                        <td><?php echo $rows['staff_name']; ?></td>
                                        <td><?php echo $modDT->format('m-d-Y - h:i A'); ?></td>
                                        <td>
                                            <a href="view-ticket?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>
                                            <?php if ($rows['rprt'] == 1) { ?>
                                                <a href="generate-pdf?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-primary" title="Download Report"><i class="fas fa-download"></i></a>
                                            <?php } elseif($rows['rprt'] == 0) { ?>
                                                <a href="edit-report?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Overdue Tab -->
                    <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">
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
                                        <?php 
                                            if ($rows['sched_end'] < date('Y-m-d H:i:s')) {
                                                echo '<td class="text-danger">' . formatSchedule($rows['sched_start'], $rows['sched_end']) . '</td>';
                                            } else {
                                                echo '<td>' . formatSchedule($rows['sched_start'], $rows['sched_end']) . '</td>';
                                            }
                                        ?>
                                        <td><?php echo $rows['staff_name']; ?></td>
                                        <td><?php echo $modDT->format('m-d-Y - h:i A'); ?></td>
                                        <td>
                                            <a href="view-ticket?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i></a>
                                            <?php if ($rows['rprt'] == 1) { ?>
                                                <!-- <a href="view-report?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-primary" title="View Report"><i class="fas fa-file"></i></a> -->
                                                <a href="generate-pdf?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-primary" title="Download Report"><i class="fas fa-download"></i></a>
                                            <?php } elseif($rows['rprt'] == 0) { ?>
                                                <a href="edit-report?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Closed Tab -->
                    <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm w-100" id="closetck_tbl">
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
                                    <?php
                                        foreach ($closed_tickets as $rows) {
                                            $postDT = new DateTime($rows["date_posted"]);
                                            $modDT = new DateTime($rows["date_closed"]);
                                    ?>
                                    <tr>
                                        <td hidden><?php echo $postDT->format('m/d/Y - h:i A'); ?></td>
                                        <td><?php echo $rows['ticket_num']; ?></td>
                                        <td><?php echo $rows['categ_name'] . ' - ' . $rows['item_name']; ?></td>
                                        <td><?php echo $rows['outlet_name']; ?></td>
                                        <td><?php echo $rows['staff_name']; ?></td>
                                        <td><?php echo $modDT->format('m-d-Y - h:i A'); ?></td>
                                        <td>
                                            <a href="view-ticket?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-secondary" title="View Report"><i class="fas fa-eye"></i></a>
                                            <?php if ($rows['rprt'] == 1) { ?>
                                                <!-- <a href="view-report?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-primary" title="View Report"><i class="fas fa-file"></i></a> -->
                                                <a href="generate-pdf?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-primary" title="Download Report"><i class="fas fa-download"></i></a>
                                            <?php } elseif($rows['rprt'] == 0) { ?>
                                                <a href="edit-report?id=<?php echo $rows['ticket_num']; ?>" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-signature"></i></a>
                                            <?php } ?>
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
        </div>
    </div>
    
    <script src="../../assets/js/tab.staff.js"></script>
<?php include('staff.footer.php'); ?>