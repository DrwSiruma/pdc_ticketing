<div class="modal fade" id="DeclineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Ticket # <?php echo $ticket_num; ?>?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="reject-ticket?id=<?php echo $ticket_num; ?>">
                    <div class="form-group">
                        <label for="rejectReason">Select Reason for Rejection</label>
                        <select class="form-control" id="rejectReason" name="reject_reason" required>
                            <option value="" hidden selected>Select a reason</option>
                            <option value="Incomplete Information">Incomplete Information</option>
                            <option value="Duplicate Request">Duplicate Request</option>
                            <option value="Not Applicable">Not Applicable</option>
                            <option value="Other">Other (Specify)</option>
                        </select>
                    </div>

                    <div class="form-group" id="otherReasonContainer" style="display: none;">
                        <label for="otherReason">Specify Other Reason</label>
                        <input type="text" class="form-control" id="otherReason" placeholder="Enter specific reason">
                    </div>

                    <!-- Hidden input to capture the final reason -->
                    <input type="hidden" id="finalReason" name="final_reason">

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" onclick="setFinalReason()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>