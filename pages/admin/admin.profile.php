<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Profile information
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <?php
                                $user_qry = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE id = '1'");
                                while($rows=mysqli_fetch_array($user_qry)){
                                    $updateDT = new DateTime($rows["updated"]);
                            ?>
                                <tr>
                                    <th> Name</th>
                                    <td><?php echo $rows['name'];?></td>
                                </tr>

                                <tr>
                                    <th>Username</th>
                                    <td><?php echo $rows['username'];?></td>
                                </tr>

                                <tr>
                                    <th>Positon</th>
                                    <td><?php echo $rows['role'];?></td>
                                </tr>

                                <tr>
                                    <th>Last Updation Date </th>
                                    <td><?php echo $formattedDate = $updateDT->format('m/d/Y - h:i A');?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('admin.footer.php'); ?>