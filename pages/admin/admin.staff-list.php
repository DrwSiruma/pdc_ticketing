<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">IT/Maintenance Support Staffs</h1>
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
                        <button class="nav-link active" id="pills-it-tab" data-toggle="pill" data-target="#pills-it" type="button" role="tab" aria-controls="pills-it" aria-selected="true">IT Personnels</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-maint-tab" data-toggle="pill" data-target="#pills-maint" type="button" role="tab" aria-controls="pills-maint" aria-selected="false">Maintenance Personnels</button>
                    </li>
                </ul>
                <hr />

                <div class="tab-content" id="pills-tabContent">
                    <!-- it -->
                    <div class="tab-pane fade show active" id="pills-it" role="tabpanel" aria-labelledby="pills-it-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="itcattbl">
                                <thead>
                                    <tr>
                                        <th>ID #</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $it_qry = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE role = 'it'");
                                        while($it_res=mysqli_fetch_array($it_qry)){
                                    ?>
                                        <tr>
                                            <td><?php echo $it_res['id']; ?></td>
                                            <td><?php echo $it_res['name']; ?></td>
                                            <td>
                                                <?php if ($it_res["status"]== 'Active') { ?>
                                                    <i class="fas fa-fw fa-circle fa-xs text-success"></i>&nbsp;<?php echo $it_res['status']; ?>
                                                <?php } else { ?>
                                                    <i class="fas fa-fw fa-circle fa-xs text-secondary"></i>&nbsp;<?php echo $it_res['status']; ?>
                                                <?php } ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- maintenance -->
                    <div class="tab-pane fade" id="pills-maint" role="tabpanel" aria-labelledby="pills-maint-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100" id="itcattbl">
                                <thead>
                                    <tr>
                                        <th>ID #</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $maintenance_qry = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE role = 'maintenance'");
                                        while($maintenance_res=mysqli_fetch_array($maintenance_qry)){
                                    ?>
                                        <tr>
                                            <td><?php echo $maintenance_res['id']; ?></td>
                                            <td><?php echo $maintenance_res['name']; ?></td>
                                            <td>
                                                <?php if ($maintenance_res["status"]== 'Active') { ?>
                                                    <i class="fas fa-fw fa-circle fa-xs text-success"></i>&nbsp;<?php echo $maintenance_res['status']; ?>
                                                <?php } else { ?>
                                                    <i class="fas fa-fw fa-circle fa-xs text-secondary"></i>&nbsp;<?php echo $maintenance_res['status']; ?>
                                                <?php } ?>
                                            </td>
                                            <td></td>
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