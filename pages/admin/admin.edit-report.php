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
?>
    <div class="container-fluid">
        <div class="report-container">
            <div class="report-header">
                <h5 class="mb-0">TICKET SERVICE REPORT</h5>
            </div>

            <div class="report-section">
                <div class="report-section-header">SERVICE DETAILS</div>
                <div class="report-section-body">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Establishment:</label>
                                <input type="text" class="form-control" value="<?php echo $ticket_row['outlet_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date:</label>
                                <input type="date" class="form-control" value="<?php echo $datePosted->format('Y-m-d'); ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Serviced By:</label>
                                <input type="text" class="form-control" value="<?php echo $ticket_row['staff_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ticket No.:</label>
                                <input type="text" class="form-control" value="<?php echo $ticket_row['ticket_num']; ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Time In:</label>
                                <input type="time" class="form-control" name="time_in">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Time Out:</label>
                                <input type="time" class="form-control" name="time_out">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="report-section">
                <div class="report-section-header">DIAGNOSTICS AND RECOMMENDATION</div>
                <div class="report-section-body">
                    <div class="form-group">
                        <label>Subject:</label>
                        <input type="text" class="form-control" value="<?php echo $ticket_row['categ_name'] . ' - ' . $ticket_row['item_name']; ?>" name="subject" readonly>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Findings:</label>
                                <textarea class="form-control" rows="6" name="findings"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Recommendation/Action Taken:</label>
                                <textarea class="form-control" rows="6" name="recom_at"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="report-section">
                <div class="report-section-header">CLIENT ACKNOWLEDGEMENT</div>
                <div class="report-section-body">
                    <p class="text-center">The Authorized Signature below indicates that the service requested (technical support, service, or replacement of parts) indicated above was completed and in good working.</p>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" name="fn_client">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Signature:</label>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="report-section">
                <div class="report-section-header">SERVICE PERSONNEL ACKNOWLEDGEMENT</div>
                <div class="report-section-body">
                    <p class="text-center">I confirm that all reported issues were addressed, and the system is in working condition as of service completion. Recommendations are noted above.</p>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" name="fn_personnel" value="<?php echo $ticket_row['staff_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Signature:</label>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="report-footer">
                <button class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Save Report</button>
                <button class="btn btn-success"><i class="fas fa-check"></i>&nbsp;Finish Report</button>
            </div>
        </div>
    </div>
<?php include('admin.footer.php'); ?>