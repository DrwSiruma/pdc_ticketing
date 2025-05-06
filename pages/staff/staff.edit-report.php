<?php 
    include('staff.header.php');
    $ticket_num = $_GET['id'];
    $stmt = $conn->prepare("SELECT tr.*, t.sched_end FROM tbl_tickets t LEFT JOIN tbl_ticketreport tr ON t.ticket_num = tr.ticket_num WHERE tr.ticket_num = ?");
    $stmt->bind_param("s", $ticket_num);
    $stmt->execute();
    $ticket_row = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    $ticket_date = new DateTime($ticket_row['ticket_date']);
?>
    <div class="container my-5">
        <div class="container-fluid">
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <form method="post" id="ticketForm" action="update-treport?id=<?php echo $ticket_num; ?>" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" value="<?php echo !empty($ticket_row['outlet_name']) ? $ticket_row['outlet_name'] : ''; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <input type="date" class="form-control" value="<?php echo !empty($ticket_row['ticket_date']) ? $ticket_date->format('Y-m-d') : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serviced By:</label>
                                        <input type="text" class="form-control" value="<?php echo !empty($ticket_row['emp_name']) ? $ticket_row['emp_name'] : ''; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ticket No.:</label>
                                        <input type="text" class="form-control" value="<?php echo !empty($ticket_row['ticket_num']) ? $ticket_row['ticket_num'] : ''; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Time In:</label>
                                        <input type="time" class="form-control" name="time_in" value="<?php echo !empty($ticket_row['time_in']) ? date('H:i', strtotime($ticket_row['time_in'])) : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Time Out:</label>
                                        <input type="time" class="form-control" name="time_out" value="<?php echo !empty($ticket_row['time_out']) ? date('H:i', strtotime($ticket_row['time_out'])) : ''; ?>">
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
                                <input type="text" class="form-control" value="<?php echo !empty($ticket_row['subj']) ? $ticket_row['subj'] : ''; ?>" name="subject" readonly>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Findings:</label>
                                        <textarea class="form-control" rows="6" name="findings"><?php echo !empty($ticket_row['findings']) ? $ticket_row['findings'] : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Action Taken:</label>
                                        <textarea class="form-control" rows="6" name="action"><?php echo !empty($ticket_row['action']) ? $ticket_row['action'] : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diagnosis:</label>
                                        <textarea class="form-control" rows="6" name="diagnosis"><?php echo !empty($ticket_row['diagnosis']) ? $ticket_row['diagnosis'] : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Recommendation(s):</label>
                                        <textarea class="form-control" rows="6" name="recom"><?php echo !empty($ticket_row['recom']) ? $ticket_row['recom'] : ''; ?></textarea> 
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
                                        <input type="text" class="form-control" name="fn_client" value="<?php echo !empty($ticket_row['fn_client']) ? $ticket_row['fn_client'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Signature:</label>
                                        <canvas id="clientSignature" width="400" height="150" style="border: 1px solid #ccc;"></canvas>
                                        <br>
                                        <button type="button" class="btn btn-secondary" id="clearSignature">Clear</button>
                                        <input type="hidden" id="signatureInput" name="signature_client" value="<?php echo !empty($ticket_row['signature_client']) ? $ticket_row['signature_client'] : ''; ?>">
                                    </div>
                                    <script>
                                        // If signature exists, render it on the canvas
                                        const clientSignatureData = '<?php echo !empty($ticket_row['signature_client']) ? $ticket_row['signature_client'] : ''; ?>';
                                        if (clientSignatureData) {
                                            const clientCanvas = document.getElementById('clientSignature');
                                            const clientCtx = clientCanvas.getContext('2d');
                                            const clientImg = new Image();
                                            clientImg.onload = () => {
                                                clientCtx.drawImage(clientImg, 0, 0);
                                            };
                                            clientImg.src = clientSignatureData;
                                        }
                                    </script>
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
                                        <input type="text" class="form-control" name="fn_personnel" value="<?php echo !empty($ticket_row['emp_name']) ? $ticket_row['emp_name'] : ''; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Signature:</label>
                                        <canvas id="personnelSignature" width="400" height="150" style="border: 1px solid #ccc;"></canvas>
                                        <br>
                                        <button type="button" class="btn btn-secondary" id="clearPersonnelSignature">Clear</button>
                                        <input type="hidden" id="signaturePersonnelInput" name="signature_personnel" value="<?php echo !empty($ticket_row['signature_personnel']) ? $ticket_row['signature_personnel'] : ''; ?>">
                                    </div>
                                    <script>
                                        // If signature exists, render it on the canvas
                                        const personnelSignatureData = '<?php echo !empty($ticket_row['signature_personnel']) ? $ticket_row['signature_personnel'] : ''; ?>';
                                        if (personnelSignatureData) {
                                            const personnelCanvas = document.getElementById('personnelSignature');
                                            const personnelCtx = personnelCanvas.getContext('2d');
                                            const personnelImg = new Image();
                                            personnelImg.onload = () => {
                                                personnelCtx.drawImage(personnelImg, 0, 0);
                                            };
                                            personnelImg.src = personnelSignatureData;
                                        }
                                    </script>
                                </div>
                            </div>
                    <?php
                        $currentDateTime = new DateTime();
                        $schedEndDateTime = new DateTime($ticket_row['sched_end']);
                        if ($schedEndDateTime < $currentDateTime) {
                            echo '<input type="hidden" name="overdue" value="1">';
                        } else {
                            echo '<input type="hidden" name="overdue" value="0">';
                        }
                    ?>

                    <div class="report-footer">
                        <input type="hidden" name="action_type" id="actionType" value="">
                        <a href="tickets?tab=open" class="btn btn-secondary">Cancel</a>
                        <button type="button" class="btn btn-primary" id="saveReportBtn">
                            <i class="fas fa-save"></i>&nbsp;Save Report
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="../../assets/js/loader.js"></script>
<script src="../../assets/js/sign-pad.js"></script>
<?php 
    $filesToInclude = [
        'staff.footer.php'
    ];
    
    foreach ($filesToInclude as $file) {
        include($file);
    }
?>