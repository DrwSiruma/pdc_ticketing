<?php include('user.header.php'); ?>

<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="text-primary">Open new ticket</h4>
            <p class="m-0">Please fill in the form below to open a new ticket.</p>
        </div>
        <div class="card-body">
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <form action="open-ticket" class="mt-2 mb-2" method="post" enctype="multipart/form-data" onsubmit="copyDescription()">
                <div class="controls">
                    <input type="hidden" name="outlet" value="<?php echo $_SESSION['id']; ?>">
                    <div class="row">
                        <!-- Topic dropdown, initially disabled -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reported_by">Reported By (Name) <span class="text-danger">*</span></label>
                                <input type="text" id="reported_by" name="reported_by" class="form-control" required="required">
                            </div>
                        </div>

                        <!-- Designation dropdown -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_designation">Designation To <span class="text-danger">*</span></label>
                                <select id="form_designation" name="designation" class="form-control" required="required">
                                    <option value="" selected disabled>--Select Designation--</option>
                                    <option value="1">IT</option>
                                    <option value="2">Maintenance</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Topic dropdown, initially disabled -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_topic">Help Topic <span class="text-danger">*</span></label>
                                <select id="form_topic" name="topic" class="form-control" required="required" disabled>
                                    <option value="" selected disabled>--Select a Help Topic--</option>
                                </select>
                            </div>
                        </div>

                        <!-- Item dropdown, initially disabled -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_item">Item Topic <span class="text-danger">*</span></label>
                                <select id="form_item" name="item" class="form-control" required="required" disabled>
                                    <option value="" selected disabled>--Select an Item Topic--</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_description">Description <span class="text-danger">*</span></label>
                                <!-- Toolbar for formatting options -->
                                <div class="d-flex align-items-center mb-2">
                                    <button type="button" class="btn btn-light btn-sm format-btn" onclick="toggleStyle('bold')" data-command="bold"><b>B</b></button>
                                    <button type="button" class="btn btn-light btn-sm format-btn" onclick="toggleStyle('italic')" data-command="italic"><i>I</i></button>
                                    <button type="button" class="btn btn-light btn-sm format-btn" onclick="toggleStyle('underline')" data-command="underline"><u>U</u></button>
                                    <button type="button" class="btn btn-light btn-sm format-btn" onclick="toggleStyle('strikeThrough')" data-command="strikeThrough">S</button>
                                </div>
                                <!-- Contenteditable div for issue details -->
                                <div id="form_description" name="description" class="form-control" contenteditable="true" placeholder="Describe the issue..." style="min-height: 150px; border: 1px solid #ced4da; padding: 10px;"></div>
                                <input type="hidden" id="description_input" name="description" required="required">
                            </div>
                        </div>
                        
                        <!-- Supporting Image upload -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_image">Supporting Image <span class="text-danger">*</span></label>
                                <input id="form_image" type="file" name="image" class="form-control" required="required" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send pt-2 btn-block" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('user.footer.php'); ?>