<div class="modal fade" id="rasgnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">   
            <form method="post" action="reassign-ticket?id=<?php echo $ticket_num; ?>&user=<?php echo $ticket_row['outlet']; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Re-Assign Ticket #<?php echo $ticket_num; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rasgn_to">Re-assign to:</label>
                        <select class="form-control" id="rasgn_to" name="rasgn_to" required>
                            <option value="" hidden selected>Select personnel</option>
                            <?php if ($ticket_row["designation"]== '1') { ?>
                                <?php
                                $itsql = "SELECT * FROM tbl_useraccounts WHERE role = 'it'";
                                $stmt = $conn->prepare($itsql);
                                $stmt->execute();
                                $itresult = $stmt->get_result();
                                while ($itrow = $itresult->fetch_assoc()) { ?>
                                    <option value="<?php echo $itrow['id']; ?>"><?php echo $itrow['name']; ?></option>
                                <?php } ?>
                            <?php
                            } elseif ($ticket_row["designation"]== '2') { ?>
                                <?php
                                $itsql = "SELECT * FROM tbl_useraccounts WHERE role = 'maintenance'";
                                $stmt = $conn->prepare($itsql);
                                $stmt->execute();
                                $itresult = $stmt->get_result();
                                while ($itrow = $itresult->fetch_assoc()) { ?>
                                    <option value="<?php echo $itrow['id']; ?>"><?php echo $itrow['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rasgnReason">Select Reason for Re-Assigning</label>
                        <select class="form-control" id="rasgnReason" name="reassign_reason" onchange="showOtherReason2()">
                            <option value="" hidden selected>Select Option</option>
                            <option value="1">Customer Request</option>
                            <option value="2">Unavailability of Previous Assigned Personnel</option>
                            <option value="3">Other (Please Specify)</option>
                        </select>
                    </div>

                    <div class="form-group" id="otherRReasonContainer2" style="display: none;">
                        <label for="otherRReason2">Specify Other Reason</label>
                        <input type="text" class="form-control" id="otherRReason2" placeholder="Enter specific reason">
                    </div>

                    <!-- Hidden input to capture the final reason -->
                    <input type="hidden" id="finalRReason2" name="final_rreason2">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-warning" type="submit" id="rasgn_btn2">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>