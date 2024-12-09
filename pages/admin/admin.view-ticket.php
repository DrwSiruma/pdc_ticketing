<?php 
    include('admin.header.php');
    $ticket_num = $_GET['id'];
    $ticket_qry = mysqli_query($conn, "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name 
        FROM tbl_tickets t 
        LEFT JOIN tbl_useraccounts u ON t.outlet = u.id 
        LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id 
        LEFT JOIN tbl_itemlist l ON t.topicitem = l.id 
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
            <h1 class="h3 mb-0 text-gray-800"><a href="ticket" class="text-danger"><i class="far fa-times-circle"></i></a>&nbsp;Ticket # <span style="font-weight: 600;"><?php echo $ticket_num; ?></span></h1>
        </div>

        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #fff;">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle"></i>&nbsp;Ticket Summary
                </h5>
                <div>
                    <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp;Approve</a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-times"></i>&nbsp;Decline</a>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
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
                                        <label for="dept">Department:</label>
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
                                        <label for="statement">Statement:</label>
                                        <textarea name="statement" id="statement" class="form-control" rows="6" disabled><?php echo $ticket_row['description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Supporting Image:</label>
                                    <span class="form-control" style="background: #eaecf4"><a href="../<?php echo $ticket_row['file_path']; ?>"><i class="fas fa-download"></i>&nbsp;View Image</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

<?php include('admin.footer.php'); ?>