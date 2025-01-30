<?php 
    include('admin.header.php');
    $ticket_num = $_GET['id'];
    $ticket_qry = mysqli_query($conn, "SELECT t.*, t.id AS ticket_id, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name, a.name AS staff_name 
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
            <h1 class="h3 mb-0 text-gray-800"><a href="view-ticket?id=<?php echo $ticket_num; ?>" class="text-secondary"><i class="fas fa-arrow-circle-left"></i></a>&nbsp;Approve Ticket</h1>
        </div>

        <div class="container">
            <form action="ticket-approval?id=<?php echo $ticket_num; ?>&user=<?php echo $ticket_row['outlet']; ?>" method="post" enctype="multipart/form-data">
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #fff;">
                    <h5 class="mb-0">
                        Ticket #<?php echo $ticket_num; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="concern_type">Type of Concern:</label>
                                        <select name="concern_type" id="concern_type" class="form-control" require>
                                            <option value="" hidden>Select Type</option>
                                            <option value="Issue">Issue</option>
                                            <option value="Request">Request</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority_type">Priority Level:</label>
                                        <select name="priority_type" id="priority_type" class="form-control" require>
                                            <option value="" hidden>Select Type</option>
                                            <option value="P1">P1</option>
                                            <option value="P2">P2</option>
                                            <option value="P3">P3</option>
                                            <option value="P4">P4</option>
                                            <option value="P5">P5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="remarks">Remarks:</label>
                                        <textarea name="remarks" id="remarks" class="form-control" rows="5" require>Our team has received your request, and we're already reviewing the details. We'll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="assigned">Assign To:</label>
                                        <select name="assigned" id="assigned" class="form-control" require>
                                            <option value="" hidden>Select Personnel</option>
                                            <?php
                                                if ($ticket_row["designation"]== '1') {
                                                    $it_qry = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE role = 'it'");
                                                    while($it_res=mysqli_fetch_array($it_qry)){
                                            ?>
                                                        <option value="<?php echo $it_res['id']; ?>"><?php echo $it_res['name'] ?></option>
                                            <?php
                                                    }
                                                } elseif ($ticket_row["designation"]== '2') {
                                                    $maintenance_qry = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE role = 'maintenance'");
                                                    while($maintenance_res=mysqli_fetch_array($maintenance_qry)){
                                            ?>
                                                        <option value="<?php echo $maintenance_res['id']; ?>"><?php echo $maintenance_res['name'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Schedule:</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startdate">Start Date:</label>
                                        <input type="date" name="startdate" id="startdate" class="form-control" require>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="enddate">End Date:</label>
                                        <input type="date" name="enddate" id="enddate" class="form-control" require>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="outlet_name" value="<?php echo $ticket_row['outlet_name']; ?>" require>
                <input type="hidden" name="designation" value="<?php echo $ticket_row['designation']; ?>" require>
                <input type="hidden" name="date_posted" value="<?php echo $ticket_row['date_posted']; ?>" require>
                <input type="hidden" name="subject" value="<?php echo $ticket_row['categ_name'].' - '.$ticket_row['item_name']; ?>" require>
                <div class="card-footer d-flex justify-content-between align-items-center" style="background-color: #fff;">
                    <div></div>
                    <div>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i>&nbsp;Submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>

<?php include('admin.footer.php'); ?>