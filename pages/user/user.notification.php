<?php
include('user.header.php');
?>

    <div class="container my-5">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h4>Notifications</h4>
            </div>
            <div class="card-body">
                <div clss="table-responsive">
                    <table class="table w-100" id="notif_tbl">
                        <thead hidden>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>You have successfully opened ticket: PDCS1024001</td>
                                <td><a href="#" class="text-success" title="read"><i class="fas fa-check"></i></a></td>
                            </tr>
                            <tr>
                                <td>You have successfully opened ticket: PDCS1024001</td>
                                <td><a href="#" class="text-success" title="read"><i class="fas fa-check"></i></a></td>
                            </tr>

                            <!-- <tr>
                                <td colspan="2"><i>No notifications yet.</i></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('user.footer.php'); ?>