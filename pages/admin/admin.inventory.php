<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Facility Management Supplies&nbsp;<a href="add-category" class="btn btn-sm btn-dark">+</a></h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-it-tab" data-toggle="pill" data-target="#pills-it" type="button" role="tab" aria-controls="pills-it" aria-selected="true">For IT</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-maint-tab" data-toggle="pill" data-target="#pills-maint" type="button" role="tab" aria-controls="pills-maint" aria-selected="false">For Maintenance</button>
                    </li>
                </ul>
                <hr />

                <div class="tab-content" id="pills-tabContent">
                    <!-- it -->
                    <div class="tab-pane fade show active" id="pills-it" role="tabpanel" aria-labelledby="pills-it-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="itcattbl">
                                <thead hidden>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $categ_qry = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE designation = '1'");
                                        while($categ_res=mysqli_fetch_array($categ_qry)){
                                    ?>
                                        <tr>
                                            <td><?php echo $categ_res["img_path"]; ?></td>
                                            <td><?php echo $categ_res["name"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- maintenance -->
                    <div class="tab-pane fade" id="pills-maint" role="tabpanel" aria-labelledby="pills-maint-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="maincattbl">
                                <thead hidden>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $categ_qry = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE designation = '2'");
                                        while($categ_res=mysqli_fetch_array($categ_qry)){
                                    ?>
                                        <tr>
                                            <td><?php echo $categ_res["img_path"]; ?></td>
                                            <td><?php echo $categ_res["name"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('admin.footer.php'); ?>