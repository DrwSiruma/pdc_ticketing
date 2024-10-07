<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Add New Category</h1>

        <div class="card mt-4">
            <div class="card-body">
                <div class="container">
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <form action="add-category" class="mt-2 mb-2" method="post">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Name <span class="text-danger">*</span></label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter category name *" required="required" data-error="name is required.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_image">Image <span class="text-danger">*</span></label>
                                        <input id="form_image" type="file" name="image" class="form-control"  required="required" accept="image/*" data-error="select a file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_designation">Designation <span class="text-danger">*</span></label>
                                        <select id="form_designation" name="designation" class="form-control" required="required" data-error="Please specify your designation.">
                                            <option value="" selected disabled>--Select Designation--</option>
                                            <option value="1">IT</option>
                                            <option value="2">Maintenance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_need">Item Group <span class="text-danger">*</span></label>
                                        <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                            <option value="" selected disabled>--Select the Item Group--</option>
                                            <option value="1">POS</option>
                                            <option value="2">Internet</option>
                                            <option value="3">Paint</option>
                                            <option value="4">Tools/Equipment</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('admin.footer.php'); ?>