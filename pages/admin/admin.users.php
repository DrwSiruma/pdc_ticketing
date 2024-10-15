<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Accounts&nbsp;<a href="add-user" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Add new user</a></h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm w-100" id="acctbl">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $user_qry = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE id != '1'");
                                while($rows=mysqli_fetch_array($user_qry)){
                                    $createDT = new DateTime($rows["created"]);
                                    $updateDT = new DateTime($rows["updated"]);
                            ?>
                                <tr>
                                    <td>#<?php echo $rows["id"]; ?></td>
                                    <td><?php echo $rows["name"]; ?></td>
                                    <td><?php echo $rows["username"]; ?></td>
                                    <td><?php echo $rows["role"]; ?></td>
                                    <td><?php echo $formattedDate = $createDT->format('m/d/Y - h:i A'); ?></td>
                                    <td><?php echo $formattedDate = $updateDT->format('m/d/Y - h:i A'); ?></td>
                                    <td>
                                        <span class="badge text-white <?php echo $rows["status"] == 'Active' ? 'bg-success' : 'bg-secondary'; ?>">
                                            <?php echo ucfirst($rows["status"]); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark" href="edit-user?id=<?php echo $rows['id']; ?>" title="Edit User"><i class="fas fa-user-edit"></i></a>
                                        <?php if ($rows['status'] == 'Active') { ?>
                                            <a class="btn btn-sm btn-outline-dark" href="user-status?id=<?php echo $rows['id']; ?>&status=Inactive" title="Deactivate User">
                                                <i class="fas fa-user-times"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-dark" href="user-status?id=<?php echo $rows['id']; ?>&status=Active" title="Activate User">
                                                <i class="fas fa-user-check"></i>
                                            </a>
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

<?php include('admin.footer.php'); ?>