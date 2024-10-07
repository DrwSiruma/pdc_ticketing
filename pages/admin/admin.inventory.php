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
                        <button class="nav-link active" id="pills-pos-tab" data-toggle="pill" data-target="#pills-pos" type="button" role="tab" aria-controls="pills-pos" aria-selected="true">POS</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-int-tab" data-toggle="pill" data-target="#pills-int" type="button" role="tab" aria-controls="pills-int" aria-selected="false">Internet</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-paint-tab" data-toggle="pill" data-target="#pills-paint" type="button" role="tab" aria-controls="pills-paint" aria-selected="false">Painting</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-te-tab" data-toggle="pill" data-target="#pills-te" type="button" role="tab" aria-controls="pills-te" aria-selected="false">Tools / Equipment</button>
                    </li>
                </ul>
                <hr />

                <div class="tab-content" id="pills-tabContent">
                    <!-- POS -->
                    <div class="tab-pane fade show active" id="pills-pos" role="tabpanel" aria-labelledby="pills-pos-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="postbl">
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
                    <!-- Internet -->
                    <div class="tab-pane fade" id="pills-int" role="tabpanel" aria-labelledby="pills-int-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="inttbl">
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
                    <!-- Painting -->
                    <div class="tab-pane fade" id="pills-paint" role="tabpanel" aria-labelledby="pills-paint-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="painttbl">
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