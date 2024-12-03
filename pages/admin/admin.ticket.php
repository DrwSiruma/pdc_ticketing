<?php 
    include('admin.header.php');

?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ticket Request</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-sm w-100" id="ticket_tbl">
                <thead>
                    <tr>
                        <th>Post Date</th>
                        <th>Ticket #</th>
                        <th>Status</th>
                        <th>Establishment</th>
                        <th>Subject</th>
                        <th>Designation</th>
                        <th>Last Modified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ticket_qry = mysqli_query($conn, "SELECT t.*, t.status AS ticket_status, u.name AS outlet_name, c.name AS categ_name, l.name AS item_name FROM tbl_tickets t LEFT JOIN tbl_useraccounts u ON t.outlet = u.id LEFT JOIN tbl_itemcategory c ON t.topiccateg = c.id LEFT JOIN tbl_itemlist l ON t.topicitem = l.id ORDER BY t.date_posted DESC;");
                        while($rows=mysqli_fetch_array($ticket_qry)){
                            $postDT = new DateTime($rows["date_posted"]);
                            $modDT = new DateTime($rows["date_modified"]);
                    ?>
                    <tr>
                        <td><?php echo $formattedDate = $postDT->format('m/d/Y - h:i A'); ?></td>
                        <td><?php echo $rows['ticket_num']; ?></td>
                        <td>
                            <?php if ($rows["ticket_status"]== '1') { ?>
                                <span class="badge bg-success text-light">Open</span>
                            <?php } elseif ($rows["ticket_status"]== '2') { ?>
                                <span class="badge bg-warning text-light">Pending</span>
                            <?php } elseif ($rows["ticket_status"]== '3') { ?>
                                <span class="badge bg-danger text-light">Rejected</span>
                            <?php } elseif ($rows["ticket_status"]== '4') { ?>
                                <span class="badge bg-info text-light">Re-Scheduled</span>
                            <?php } elseif ($rows["ticket_status"]== '5') { ?>
                                <span class="badge bg-secondary text-light">Closed</span>
                            <?php } ?>
                        </td>
                        <td><?php echo $rows['outlet_name']; ?></td>
                        <td><?php echo $rows['categ_name'] .' - '. $rows['item_name']; ?></td>
                        <!-- <td> -->
                            <?php
                                if ($rows['designation'] == 1) {
                                    echo "<td class='bg-info text-light'>IT</td>";
                                } else {
                                    echo "<td class='bg-warning text-light'>Maintenance</td>";
                                }
                            ?>
                        <!-- </td> -->
                        <td><?php echo $formattedDate = $modDT->format('m-d-Y - h:i A'); ?></td>
                        <td>
                            <a href="#" class="btn-sm btn-secondary" title="View"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn-sm btn-success" title="Edit Report"><i class="fas fa-file-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('admin.footer.php'); ?>