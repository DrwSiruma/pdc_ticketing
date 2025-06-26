<?php
    include('user.header.php');
    $user_id = $_SESSION['id'];
?>


    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-4">
            <h4 class="mb-0"><i class="fas fa-history"></i> Ticket History</h4>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table w-100" id="itcattbl">
                        <thead>
                            <tr>
                                <th hidden>Close Date</th>
                                <th>Ticket #</th>
                                <th>Category</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ticket_qry = mysqli_query($conn, "SELECT tk.*, tc.name AS categ_name, tl.name AS item_name, ua.name AS str_name FROM `tbl_tickets` tk LEFT JOIN `tbl_itemcategory` tc ON tk.topiccateg = tc.id LEFT JOIN `tbl_itemlist` tl ON tk.topicitem = tl.id LEFT JOIN `tbl_useraccounts` ua ON tk.outlet = ua.id WHERE ua.id = $user_id AND tk.status ='5'");
                                while($ticket_res=mysqli_fetch_array($ticket_qry)){
                            ?>
                            <tr>
                                <td hidden><?php echo date('m/d/Y - h:i A', strtotime($ticket_res['date_closed'])); ?></td>
                                <td><?php echo $ticket_res['ticket_num']; ?></td>
                                <td><?php echo $ticket_res['categ_name']; ?></td>
                                <td><?php echo $ticket_res['item_name']; ?></td>
                                <td>
                                    <?php if ($ticket_res["status"]== '1') { ?>
                                        Open
                                    <?php } elseif ($ticket_res["status"]== '2') { ?>
                                        Pending
                                    <?php } elseif ($ticket_res["status"]== '3') { ?>
                                        Rejected
                                    <?php } elseif ($ticket_res["status"]== '4') { ?>
                                        Re-Scheduled
                                    <?php } elseif ($ticket_res["status"]== '5') { ?>
                                        Closed
                                    <?php } ?>
                                </td>
                                <td><?php echo $ticket_res['remark']; ?></td>
                                <td>
                                    <?php
                                    if ($ticket_res['designation'] == 1) {
                                        echo '<a href="generate-it-report?id=' . urlencode($ticket_res['ticket_num']) . '" class="btn btn-sm btn-outline-secondary" title="Download Report"><i class="fas fa-download"></i>&nbsp;View Report</a>';
                                    } elseif ($ticket_res['designation'] == 2) {
                                        echo '<a href="generate-maintenance-report?id=' . urlencode($ticket_res['ticket_num']) . '" class="btn btn-sm btn-outline-secondary" title="Download Report"><i class="fas fa-download"></i>&nbsp;View Report</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('user.footer.php'); ?>