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
                        <button class="nav-link active" id="pills-ed-tab" data-toggle="pill" data-target="#pills-ed" type="button" role="tab" aria-controls="pills-ed" aria-selected="true">Electronic Devices</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-appl-tab" data-toggle="pill" data-target="#pills-appl" type="button" role="tab" aria-controls="pills-appl" aria-selected="false">Appliances</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-furn-tab" data-toggle="pill" data-target="#pills-furn" type="button" role="tab" aria-controls="pills-furn" aria-selected="false">Furniture</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-te-tab" data-toggle="pill" data-target="#pills-te" type="button" role="tab" aria-controls="pills-te" aria-selected="false">Tools / Equipment</button>
                    </li>
                </ul>
                <hr />

                <div class="tab-content" id="pills-tabContent">
                    <!-- Electronic Devices -->
                    <div class="tab-pane fade show active" id="pills-ed" role="tabpanel" aria-labelledby="pills-ed-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="edtbl">
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
                    <!-- Appliances -->
                    <div class="tab-pane fade" id="pills-appl" role="tabpanel" aria-labelledby="pills-appl-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="appltbl">
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
                    <!-- Furniture -->
                    <div class="tab-pane fade" id="pills-furn" role="tabpanel" aria-labelledby="pills-furn-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="furntbl">
                                <thead hidden>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $categ_qry = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE designation = '3'");
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
                    <!-- Tools / Equipment -->
                    <div class="tab-pane fade" id="pills-te" role="tabpanel" aria-labelledby="pills-te-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="tetbl">
                                <thead hidden>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $categ_qry = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE designation = '4'");
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