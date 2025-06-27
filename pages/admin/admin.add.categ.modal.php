<div class="modal fade" id="addCategModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="add-category" class="mt-2 mb-2" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_name">Name <span class="text-danger">*</span></label>
                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter category name *" required="required" data-error="name is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_designation">Designation <span class="text-danger">*</span></label>
                                <select id="form_designation" name="designation" class="form-control" required="required" data-error="Please specify your designation.">
                                    <option value="" selected disabled>--Select Designation--</option>
                                    <option value="1">IT</option>
                                    <option value="2">Maintenance</option>
                                </select>
                            </div>
                        </div>
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