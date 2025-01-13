<div class="modal fade" id="TCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">   
            <form method="post" action="edit-tc?id=<?php echo $ticket_num; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_tc">Type of Concern:</label>
                        <select class="form-control" id="new_tc" name="new_tc" required>
                            <option value="Issue" <?php if ($ticket_row['concern_type'] == 'Issue') echo 'selected'; ?>>Issue</option>
                            <option value="Request" <?php if ($ticket_row['concern_type'] == 'Request') echo 'selected'; ?>>Request</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>