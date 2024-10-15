<div class="modal fade" id="additemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add-itemlist" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new item</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="form_name">Item name: <span class="text-danger">*</span></label>
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter item name *" required="required" data-error="name is required.">
                    <input type="text" name="itemcateg" class="form-control" required="required" data-error="name is required." value="<?php echo $_GET['item']; ?>" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit"><i class="fas fa-plus"></i>&nbsp;Add</button>
            </div>
            </form>
        </div>
    </div>
</div>