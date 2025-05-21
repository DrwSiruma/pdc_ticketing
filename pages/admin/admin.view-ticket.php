<?php 
    include('admin.header.php');
    $ticket_num = $_GET['id'];
    $ticket_qry = mysqli_query($conn, "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.id AS staff_id, a.name AS staff_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
        LEFT JOIN tbl_useraccounts a ON t.assigned = a.id
        WHERE t.ticket_num = '$ticket_num'");
    $ticket_row = mysqli_fetch_array($ticket_qry);
    $datePosted = new DateTime($ticket_row['date_posted']);
    $formattedDatePosted = $datePosted->format('Y-m-d\TH:i');
    if ($ticket_row["ticket_status"]== '1') {
        $ticket_status = "Open";
    } elseif ($ticket_row["status"]== '2') {
        $ticket_status = "Pending";
    } elseif ($ticket_row["status"]== '3') {
        $ticket_status = "Rejected";
    } elseif ($ticket_row["status"]== '4') {
        $ticket_status = "Re-Scheduled";
    } elseif ($ticket_row["status"]== '5') {
        $ticket_status = "Closed";
    }

    if ($ticket_row["designation"]== '1') {
        $ticket_dept = "IT";
    } elseif ($ticket_row["designation"]== '2') {
        $ticket_dept = "Maintenance";
    }
    
?>
    <style>
        label {
            font-weight: 500;
        }
    </style>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href="
            <?php
                if ($ticket_row["ticket_status"] == '1' || $ticket_row["ticket_status"] == '4') {
                    echo "ticket?tab=open";
                } elseif ($ticket_row["status"]== '2') {
                    echo "ticket?tab=pending";
                } elseif ($ticket_row["status"]== '3') {
                    echo "ticket?tab=rejected";
                } elseif ($ticket_row['sched_end'] < date('Y-m-d H:i:s') && $ticket_row['ticket_status'] != '5') {
                    echo "ticket?tab=overdue";
                } elseif ($ticket_row["status"]== '5') {
                    echo "ticket?tab=closed";
                }
            ?>
            " class="text-danger"><i class="far fa-times-circle"></i></a>&nbsp;Ticket # <span style="font-weight: 600;"><?php echo $ticket_num; ?></span></h1>
        </div>

        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #fff;">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle"></i>&nbsp;Ticket Summary
                </h5>
                <div>
                    <?php if ($ticket_row["ticket_status"] == '1' || $ticket_row["ticket_status"] == '4') { ?>
                        <button data-toggle="modal" data-target="#rschdModal" class="btn btn-primary btn-sm" <?php echo ($ticket_row['rprt'] == '1') ? 'disabled' : ''; ?>><i class="fas fa-calendar"></i>&nbsp;Re-Schedule</button>
                        <button data-toggle="modal" data-target="#rasgnModal" class="btn btn-warning btn-sm" <?php echo ($ticket_row['rprt'] == '1') ? 'disabled' : ''; ?>><i class="fas fa-user-edit"></i>&nbsp;Re-Assign</button>
                        <?php if ($ticket_row['rprt'] == '1') { ?>
                            <button data-toggle="modal" data-target="#closeModal" class="btn btn-info btn-sm"><i class="fas fa-check"></i>&nbsp;Resolve</button>
                        <?php }else { ?>
                            <button type="button" class="btn btn-success btn-sm" disabled><i class="fas fa-check"></i>&nbsp;Resolve</button>
                        <?php } ?>
                    <?php } elseif ($ticket_row["ticket_status"] == '2') { ?>
                        <a href="ticket-approval?id=<?php echo $ticket_num; ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp;Approve</a>
                        <a href="#" data-toggle="modal" data-target="#DeclineModal" class="btn btn-danger btn-sm"><i class="fas fa-times"></i>&nbsp;Decline</a>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <?php
                    if ($ticket_row['ticket_status'] != '5' || $ticket_row['rprt'] != '1') {
                        if ($ticket_row['sched_end'] < date('Y-m-d H:i:s')) {
                            echo '<div class="alert" style="background: red;color: #fff;"><i class="fas fa-exclamation-triangle"></i>&nbsp;Ticket Schedule is Overdue!</div>';
                        }
                    }
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reported_by">Reported By:</label>
                                    <input type="text" name="reported_by" id="reported_by" class="form-control" value="<?php echo $ticket_row['reported_by']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from">From:</label>
                                    <input type="text" name="from" id="from" class="form-control" value="<?php echo $ticket_row['outlet_name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date-posted">Date Posted:</label>
                                    <input type="datetime-local" name="date-posted" id="date-posted" class="form-control" value="<?php echo $formattedDatePosted; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Ticket State:</label>
                                    <input type="text" name="status" id="status" class="form-control" value="<?php echo $ticket_status; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dept">Designated to:</label>
                                    <input type="text" name="dept" id="dept" class="form-control" value="<?php echo $ticket_dept; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categ">Topic Category:</label>
                                    <input type="text" name="categ" id="categ" class="form-control" value="<?php echo $ticket_row['categ_name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item">Topic Item:</label>
                                    <input type="text" name="item" id="item" class="form-control" value="<?php echo $ticket_row['item_name']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Statement:</label>
                                    <p class="p-control"><i><?php echo $ticket_row['description']; ?></i></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Supporting Image:</label>
                                <span class="form-control" style="background: #eaecf4"><a href="../<?php echo $ticket_row['file_path']; ?>"><i class="fas fa-download"></i>&nbsp;View Image</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
                if ($ticket_row["ticket_status"] == '1' || $ticket_row["ticket_status"] == '4' || $ticket_row["ticket_status"] == '5') {
        ?>
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="concern_type">Type of Concern:</label>
                                        <?php
                                            if ($ticket_row["ticket_status"] == '1' || $ticket_row["ticket_status"] == '4') {
                                        ?>
                                            <a href="#" <?php echo ($ticket_row['rprt'] == '1') ? 'class="btn btn-link disabled p-0"' : ''; ?> data-toggle="modal" data-target="#TCModal"><i class="fas fa-edit"></i></a>
                                        <?php } ?>
                                    </div>
                                    <input type="text" name="concern_type" id="concern_type" class="form-control" value="<?php echo $ticket_row['concern_type']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="priority_type">Priority Level:</label>
                                        <?php
                                            if ($ticket_row["ticket_status"] == '1' || $ticket_row["ticket_status"] == '4') {
                                        ?>
                                            <a href="#" <?php echo ($ticket_row['rprt'] == '1') ? 'class="btn btn-link disabled p-0"' : ''; ?> data-toggle="modal" data-target="#PLModal"><i class="fas fa-edit"></i></a>
                                        <?php } ?>
                                    </div>
                                    <input type="text" name="priority_type" id="priority_type" class="form-control" value="<?php echo $ticket_row['priority_type']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="remarks">Remarks:</label>
                                    <p class="p-control"><i><?php echo $ticket_row['remark']; ?></i></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="assigned">Assign To:</label>
                                    <input type="text" name="assigned" id="assigned" class="form-control" value="<?php echo $ticket_row['staff_name']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-0">
                                    <label class="text-primary">Schedule:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startdate">Start Date:</label>
                                    <input type="date" name="startdate" id="startdate" class="form-control" value="<?php echo $ticket_row['sched_start']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="enddate">End Date:</label>
                                    <input type="date" name="enddate" id="enddate" class="form-control 
                                        <?php
                                            if ($ticket_row['ticket_status'] == '5' || $ticket_row['rprt'] == '1') {
                                                echo '';
                                            } else {
                                                if ($ticket_row['sched_end'] < date('Y-m-d H:i:s')) {
                                                    echo 'bg-danger text-light';
                                                } else {
                                                    echo '';
                                                }
                                            }
                                        ?>
                                    " value="<?php echo $ticket_row['sched_end']; ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

<?php 
    include('admin.tc-modal.php');
    include('admin.pl-modal.php');
    include('admin.rschd-modal.php');
    include('admin.rasgn-modal.php');
    include('admin.closeticket-modal.php');
    include('admin.decline-modal.php');
    include('admin.footer.php'); 
?>