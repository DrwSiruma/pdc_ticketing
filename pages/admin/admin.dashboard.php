<?php 
    include('admin.header.php');
?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Registered Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $acc_qry = "SELECT COUNT(*) FROM tbl_useraccounts WHERE status='Active' AND id != '1'";
                                        $result = mysqli_query($conn, $acc_qry) or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($result)) {
                                            if($row[0] <= 0) {
                                                echo "0";
                                            }
                                            else {
                                                echo "$row[0]";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Active IT Personel</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo '1';?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Maintenance Personel
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo '1';?></div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Inactive Users</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $inacc_qry = "SELECT COUNT(*) FROM tbl_useraccounts WHERE status='Inactive'";
                                        $result4 = mysqli_query($conn, $inacc_qry) or die(mysqli_error($conn));
                                        while ($row4 = mysqli_fetch_array($result4)) {
                                            if($row4[0] <= 0) {
                                                echo "0";
                                            }
                                            else {
                                                echo "$row4[0]";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-gear"></i>&nbsp;System Logs
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm w-100" id="syslogtbl">
                                <thead class="bg-dark text-light">
                                    <th>User</th>
                                    <th>Activity</th>
                                    <th>Date</th>
                                </thead>
                                <tbody>
                                <?php
                                    $adlog_qry = mysqli_query($conn, "SELECT a.*, u.username FROM tbl_auditlog a LEFT JOIN tbl_useraccounts u ON a.user_id = u.id ORDER BY a.date_posted DESC;");
                                    while($adlog_res=mysqli_fetch_array($adlog_qry)){
                                        $createDT = new DateTime($adlog_res["date_posted"]);
                                ?>
                                <tr>
                                    <td><?php echo $adlog_res['username']; ?></td>
                                    <td><?php echo $adlog_res['activity']; ?></td>
                                    <td><?php echo $formattedDate = $createDT->format('m/d/Y - h:i A'); ?></td>
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