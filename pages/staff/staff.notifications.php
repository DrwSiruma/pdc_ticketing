<?php
include('staff.header.php');
// $user_id = $_SESSION['id'];
// $notif_qry = mysqli_query($conn, "SELECT * FROM `tbl_notif` WHERE user_id = $user_id ORDER BY post_date DESC");
?>

    <div class="container my-5">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color:#fff;">
                <div>
                    <h4>Notifications</h4>
                </div>
                <div>
                    <a href="mark-all-read?id=<?php echo $user_id; ?>"><i class="fas fa-check"></i>&nbsp;Mark All as Read</a>
                </div>
            </div>
            <div class="card-body">
                <div clss="table-responsive">
                    <table class="table w-100" id="notif_tbl">
                        <thead>
                            <tr>
                                <th hidden></th>
                                <th hidden></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php
                                //if (mysqli_num_rows($notif_qry) > 0) {
                                //    mysqli_data_seek($notif_qry, 0); // Reset pointer to start
                                //    while($notif_row=mysqli_fetch_array($notif_qry)){
                                //        if ($notif_row['status']=='1') {
                            ?>
                            <tr style="background-color: rgba(0, 0, 0, .03);">
                                <td><?php // echo $notif_row['notif_msg']; ?></td>
                                <td><a href="mark-read?id=<?php // echo $notif_row['id']; ?>" class="text-success" title="read"><i class="fas fa-check"></i></a></td>
                            </tr>
                            <?php // } else{ ?>
                                <tr>
                                    <td><?php // echo $notif_row['notif_msg']; ?></td>
                                    <td></td>
                                </tr>
                            <?php 
                                //         }
                                //     }
                                // } else {
                                //     echo "<tr><td colspan='2'><i>No notifications yet.</i></td></tr>";
                                // }
                            ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script>
    function loadStaffNotifications() {
        fetch('notif-data')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#notif_tbl tbody');
                if (!tbody) return;
                if (data.notifications.length === 0) {
                    tbody.innerHTML = "<tr><td colspan='2'><i>No notifications yet.</i></td></tr>";
                    return;
                }
                tbody.innerHTML = data.notifications.map(notif => {
                    if (notif.status == '1') {
                        return `<tr style="background-color: rgba(0,0,0,.03);">
                            <td>${notif.msg}</td>
                            <td><a href="mark-read?id=${notif.id}" class="text-success" title="read"><i class="fas fa-check"></i></a></td>
                        </tr>`;
                    } else {
                        return `<tr><td>${notif.msg}</td><td></td></tr>`;
                    }
                }).join('');
            });
    }
    setInterval(loadStaffNotifications, 2000);
    document.addEventListener('DOMContentLoaded', loadStaffNotifications);
</script>

<?php include('staff.footer.php'); ?>