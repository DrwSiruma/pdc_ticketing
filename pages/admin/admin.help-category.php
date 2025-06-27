<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Facility Management Supplies Category&nbsp;<a href="#" data-toggle="modal" data-target="#addCategModal" class="btn btn-sm btn-success"><i class="fas fa-plus"></i>&nbsp;Add new category</a></h1>
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
                            <table class="table w-100" id="itcattbl">
                                <thead hidden>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $categ_qry = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE designation = '1'");
                                        $no = '1';
                                        while($categ_res=mysqli_fetch_array($categ_qry)){
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td style="cursor:pointer;" onclick="window.location.href='item-list?item=<?php echo $categ_res['id']; ?>'">
                                                <?php if ($categ_res["status"] == '1') { ?>
                                                    <span><i class="fas fa-fw fa-circle fa-xs text-success"></i></span>
                                                <?php } else { ?>
                                                    <span><i class="fas fa-fw fa-circle fa-xs text-secondary"></i></span>
                                                <?php } ?> 
                                            </td>
                                            <td style="cursor:pointer;" onclick="window.location.href='item-list?item=<?php echo $categ_res['id']; ?>'"><a href="item-list?item=<?php echo $categ_res['id']; ?>"><?php echo $categ_res["name"]; ?></a></td>
                                            <td class="text-right">
                                                <a href="edit-category?id=<?php echo $categ_res['id']; ?>" class="text-secondary p-1"><i class="fas fa-pencil-alt"></i></a>
                                                <?php if ($categ_res["status"]== '1') { ?>
                                                    <a href="status-categ?id=<?php echo $categ_res["id"]; ?>&status=0" class="text-secondary p-1"><i class="fas fa-ban"></i></a>
                                                <?php } else { ?>
                                                    <a href="status-categ?id=<?php echo $categ_res["id"]; ?>&status=1" class="text-secondary p-1"><i class="fas fa-check"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- maintenance -->
                    <div class="tab-pane fade" id="pills-maint" role="tabpanel" aria-labelledby="pills-maint-tab">
                        <div class="table-responsive">
                            <table class="table w-100" id="maincattbl">
                                <thead hidden>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $categ_qry2 = mysqli_query($conn, "SELECT * FROM tbl_itemcategory WHERE designation = '2'");
                                        $no = '1';
                                        while($categ_res2=mysqli_fetch_array($categ_qry2)){
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td style="cursor:pointer;" onclick="window.location.href='item-list?item=<?php echo $categ_res2['id']; ?>'">
                                                <?php if ($categ_res2["status"] == '1') { ?>
                                                    <span><i class="fas fa-fw fa-circle fa-xs text-success"></i></span>
                                                <?php } else { ?>
                                                    <span><i class="fas fa-fw fa-circle fa-xs text-secondary"></i></span>
                                                <?php } ?> 
                                            </td>
                                            <td style="cursor:pointer;" onclick="window.location.href='item-list?item=<?php echo $categ_res2['id']; ?>'"><a href="item-list?item=<?php echo $categ_res2['id']; ?>"><?php echo $categ_res2["name"]; ?></a></td>
                                            <td class="text-right">
                                                <a href="edit-category?id=<?php echo $categ_res2['id']; ?>" class="text-secondary p-1"><i class="fas fa-pencil-alt"></i></a>
                                                <?php if ($categ_res2["status"]== '1') { ?>
                                                    <a href="status-categ?id=<?php echo $categ_res2["id"]; ?>&status=0" class="text-secondary p-1"><i class="fas fa-ban"></i></a>
                                                <?php } else { ?>
                                                    <a href="status-categ?id=<?php echo $categ_res2["id"]; ?>&status=1" class="text-secondary p-1"><i class="fas fa-check"></i></a>
                                                <?php } ?>
                                            </td>
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

<?php 
    include('admin.add.categ.modal.php');
    include('admin.footer.php');
?>