<div class="modal fade" id="rschdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">   
            <form method="post" action="resched-ticket?id=<?php echo $ticket_num; ?>&user=<?php echo $ticket_row['outlet']; ?>" onsubmit="return setFinalRReason()">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Re-Schedule Ticket #<?php echo $ticket_num; ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reschedSDate">Select Start Date</label>
                                <input type="date" class="form-control" id="reschedSDate" name="resched_sdate" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reschedEDate">Select End Date</label>
                                <input type="date" class="form-control" id="reschedETime" name="resched_edate" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rschdReason">Select Reason for Re-Schedule</label>
                        <select class="form-control" id="rschdReason" name="resched_reason" onchange="showOtherReason()">
                            <option value="" hidden selected>Select Option</option>
                            <option value="Customer Request">Customer Request</option>
                            <option value="Technical Issue">Technical Issue</option>
                            <option value="Unavailability of Assigned Personnel">Unavailability of Assigned Personnel</option>
                            <option value="3">Other</option>
                        </select>
                    </div>

                    <div class="form-group" id="otherRReasonContainer" style="display: none;">
                        <label for="otherRReason">Specify Other Reason</label>
                        <input type="text" class="form-control" id="otherRReason" placeholder="Enter specific reason">
                    </div>

                    <!-- Hidden input to capture the final reason -->
                    <input type="hidden" id="finalRReason" name="final_rreason">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>