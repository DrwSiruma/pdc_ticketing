<?php 
    include('admin.header.php');
    $ticket_num = $_GET['id'];
    $ticket_qry = mysqli_query($conn, "SELECT tr.*, t.sched_end FROM tbl_tickets t LEFT JOIN tbl_ticketreport tr ON t.ticket_num = tr.ticket_num WHERE tr.ticket_num = '$ticket_num'");
    $ticket_row = mysqli_fetch_array($ticket_qry);
    $ticket_date = new DateTime($ticket_row['ticket_date']);
?>
    <div class="container-fluid">
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="post" id="ticketForm" action="update-treport?id=<?php echo $ticket_num; ?>" enctype="multipart/form-data">
        <div class="report-section">
            <div class="report-section-header">SERVICE DETAILS</div>
            <div class="report-section-body">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Outlet / Establishment:</label>
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
        <!-- DIAGNOSTICS, ACTION & RECOMMENDATION -->
        <div class="report-section">
            <div class="report-section-header">DIAGNOSTICS • ACTION • RECOMMENDATION</div>
            <div class="report-section-body">

                <!-- Concern -->
                <div class="form-group">
                    <label>Concern:</label>
                    <input type="text"
                        class="form-control"
                        value="<?= $ticket_row['subj'] ?? '' ?>"
                        name="subject"
                        readonly>
                </div>

                <div class="form-row">
                    <!-- DIAGNOSIS -->
                    <div class="col-md-6 mb-3">
                        <label>Diagnosis:</label>
                        <textarea class="form-control"
                                rows="6"
                                name="diagnosis"><?= $ticket_row['diagnosis'] ?? '' ?></textarea>
                    </div>

                    <!-- ROOT CAUSE (was “Findings”) -->
                    <div class="col-md-6 mb-3">
                        <label>Root&nbsp;Cause:</label>
                        <textarea class="form-control"
                                rows="6"
                                name="findings"><?= $ticket_row['findings'] ?? $ticket_row['findings'] ?? '' ?></textarea>
                    </div>

                    <!-- ACTION TAKEN -->
                    <div class="col-md-6 mb-3">
                        <label>Action&nbsp;Taken:</label>
                        <textarea class="form-control"
                                rows="6"
                                name="action"><?= $ticket_row['action'] ?? '' ?></textarea>
                    </div>

                    <!-- RECOMMENDATION -->
                    <div class="col-md-6 mb-3">
                        <label>Recommendation(s):</label>
                        <textarea class="form-control"
                                rows="6"
                                name="recom"><?= $ticket_row['recom'] ?? '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- ACKNOWLEDGEMENTS -->
        <div class="report-section">
            <div class="report-section-header">SIGNATURES & ACKNOWLEDGEMENTS</div>
            <div class="report-section-body">

                <p class="text-center small text-muted mb-4">
                    Signatories confirm that all work described above was completed and accepted.
                </p>

                <div class="form-row">
                    <!-- CLIENT -->
                    <div class="col-lg-4 mb-4">
                        <h6 class="text-center">Crew Signature</h6>

                        <div class="form-group">
                            <label>Full&nbsp;Name:</label>
                            <input type="text"
                                class="form-control"
                                name="fn_client"
                                value="<?= $ticket_row['fn_client'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label>Signature:</label><br>
                            <canvas id="clientSignature"
                                    width="400" height="150"
                                    style="border: 1px solid #ccc;"
                                    class="signature-pad"></canvas>
                            <button type="button"
                                    class="btn btn-secondary btn-sm"
                                    id="clearSignature">Clear</button>
                            <input type="hidden"
                                id="signatureInput"
                                name="signature_client"
                                value="<?= $ticket_row['signature_client'] ?? '' ?>">
                        </div>
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

                    <!-- ACKNOWLEDGED BY (NEW) -->
                    <div class="col-lg-4 mb-4">
                        <h6 class="text-center">Acknowledged&nbsp;By</h6>

                        <div class="form-group">
                            <label>Full&nbsp;Name:</label>
                            <input type="text"
                                class="form-control"
                                name="fn_ack"
                                value="<?= $ticket_row['fn_signiture2'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label>Signature:</label><br>
                            <canvas id="ackSignature"
                                    width="400" height="150"
                                    style="border: 1px solid #ccc;"
                                    class="signature-pad"></canvas>
                            <button type="button"
                                    class="btn btn-secondary btn-sm"
                                    id="clearAckSignature">Clear</button>
                            <input type="hidden"
                                id="signatureAckInput"
                                name="signature_ack"
                                value="<?= $ticket_row['signiture_2'] ?? '' ?>">
                        </div>
                    </div>
                    <script>
                        // If signature exists, render it on the canvas
                        const acknowledgeSignatureData = '<?php echo !empty($ticket_row['signature_2']) ? $ticket_row['signature_2'] : ''; ?>';
                        if (acknowledgeSignatureData) {
                            const acknowledgeCanvas = document.getElementById('ackSignature');
                            const acknowledgeCtx = acknowledgeCanvas.getContext('2d');
                            const acknowledgeImg = new Image();
                            acknowledgeImg.onload = () => {
                                acknowledgeCtx.drawImage(acknowledgeImg, 0, 0);
                            };
                            acknowledgeImg.src = acknowledgeSignatureData;
                        }
                    </script>

                    <!-- SERVICE PERSONNEL -->
                    <div class="col-lg-4 mb-4">
                        <h6 class="text-center">Service&nbsp;Personnel</h6>

                        <div class="form-group">
                            <label>Full&nbsp;Name:</label>
                            <input type="text"
                                class="form-control"
                                name="fn_personnel"
                                value="<?= $ticket_row['emp_name'] ?? '' ?>"
                                readonly>
                            <input type="hidden"
                                name="emp_id"
                                value="<?= $ticket_row['emp_id'] ?? '' ?>">
                        </div>

                        <div class="form-group">
                            <label>Signature:</label><br>
                            <canvas id="personnelSignature"
                                    width="400" height="150"
                                    style="border: 1px solid #ccc;"
                                    class="signature-pad"></canvas>
                            <button type="button"
                                    class="btn btn-secondary btn-sm"
                                    id="clearPersonnelSignature">Clear</button>
                            <input type="hidden"
                                id="signaturePersonnelInput"
                                name="signature_personnel"
                                value="<?= $ticket_row['signature_personnel'] ?? '' ?>">
                        </div>
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

        <div class="report-footer mb-4">
            <input type="hidden" name="action_type" id="actionType" value="">
            <a href="ticket?tab=open" class="btn btn-secondary">Cancel</a>
            <button type="button" class="btn btn-primary" id="saveReportBtn">
                <i class="fas fa-save"></i>&nbsp;Save Report
            </button>
            <button type="button" class="btn btn-success" id="finishReportBtn">
                <i class="fas fa-check"></i>&nbsp;Finish Report
            </button>
        </div>
        </form>
    </div>
<script src="../../assets/js/loader.js"></script>
<script src="../../assets/js/sign-pad.js"></script>
<?php 
    $filesToInclude = [
        'admin.finish-modal.php',
        'admin.footer.php'
    ];
    
    foreach ($filesToInclude as $file) {
        include($file);
    }
?>