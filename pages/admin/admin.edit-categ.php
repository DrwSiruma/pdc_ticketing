<?php
    include('admin.header.php');

    if (isset($_GET['id'])) {
        $categ_id = intval($_GET['id']);
        $query = $conn->prepare("SELECT * FROM tbl_itemcategory WHERE id = ?");
        $query->bind_param("i", $categ_id);
        $query->execute();
        $result = $query->get_result();
        $categ_res = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Invalid request.";
        header("Location: inventory");
        exit();
    }
?>

    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800"><a href="help-categories"><i class="fas fa-times-circle text-danger"></i></a>&nbsp;Edit Category</h1>

        <div class="container">
            <div class="card mt-4">
                <div class="card-body">
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <form action="edit-category" class="mt-2 mb-2" method="post" enctype="multipart/form-data">
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="itemid" class="form-control" value="<?php echo htmlspecialchars($categ_res['id']); ?>" placeholder="Please enter category name *" required="required" data-error="name is required.">
                                    <div class="form-group">
                                        <label for="form_name">Name <span class="text-danger">*</span></label>
                                        <input id="form_name" type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($categ_res['name']); ?>" placeholder="Please enter category name *" required="required" data-error="name is required.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_designation">Designation <span class="text-danger">*</span></label>
                                        <select id="form_designation" name="designation" class="form-control" required="required" data-error="Please specify your designation.">
                                            <option value="1" <?php if ($categ_res['designation'] == '1') echo 'selected'; ?>>IT</option>
                                            <option value="2" <?php if ($categ_res['designation'] == '2') echo 'selected'; ?>>Maintenance</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
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