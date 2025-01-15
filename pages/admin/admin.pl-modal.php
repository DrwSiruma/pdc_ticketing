<div class="modal fade" id="PLModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">   
            <form method="post" action="edit-pl?id=<?php echo $ticket_num; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_pl">Priority Level:</label>
                        <select class="form-control" id="new_pl" name="new_pl" required>
                            <option value="P1" <?php if ($ticket_row['priority_type'] == 'P1') echo 'selected'; ?>>P1</option>
                            <option value="P2" <?php if ($ticket_row['priority_type'] == 'P2') echo 'selected'; ?>>P2</option>
                            <option value="P3" <?php if ($ticket_row['priority_type'] == 'P3') echo 'selected'; ?>>P3</option>
                            <option value="P4" <?php if ($ticket_row['priority_type'] == 'P4') echo 'selected'; ?>>P4</option>
                            <option value="P5" <?php if ($ticket_row['priority_type'] == 'P5') echo 'selected'; ?>>P5</option>
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