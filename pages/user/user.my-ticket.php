<?php
include('user.header.php');

if (isset($_GET['id'])) {
  $ticket_id = intval($_GET['id']);
  $query = $conn->prepare("SELECT tk.*, tc.name AS categ_name, tl.name AS item_name, ua.name AS str_name FROM `tbl_tickets` tk LEFT JOIN `tbl_itemcategory` tc ON tk.topiccateg = tc.id LEFT JOIN `tbl_itemlist` tl ON tk.topicitem = tl.id LEFT JOIN `tbl_useraccounts` ua ON tk.outlet = ua.id WHERE tk.id = ?");
  $query->bind_param("i", $ticket_id);
  $query->execute();
  $result = $query->get_result();
  $row = $result->fetch_array();
} else {
  $_SESSION['error'] = "Invalid request.";
  header("Location: track-ticket");
  exit();
}
?>

    <div class="container text-center my-5">
        <h1 class="display-6 font-weight-bold"></h1>
        
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-group row text-left mb-0">
                    <div class="col-sm-9">
                        <h5 class="font-weight-bold">My Ticket</h5>
                    </div>
                    <div class="col-sm-3 py-1">
                        <h6><?php echo date('F d, Y - g:i A'); ?></h6>
                    </div>
                </div>
                <hr>
                <div class="form-group row text-left mb-0 py-2">
                    <div class="col-sm-4 py-1">
                        <h6 class="font-weight-bold">Name:&nbsp;<?php echo $row['str_name']; ?></h6>
                        <h6>
                          <?php
                            $date = new DateTime($row['date_posted']);
                            echo "Date Posted:&nbsp;" . $date->format('m-d-Y h:i a');
                          ?>
                        </h6>
                    </div>
                    <div class="col-sm-4 py-1"></div>
                    <div class="col-sm-4 py-1">
                      <h6 class="font-weight-bold">TICKET #: <?php echo $row['ticket_num']; ?></h6> 
                      <h6>Designation: IT</h6>
                      <h6></h6>
                    </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered w-100" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Item</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row" width="20"><?php echo $row['categ_name']; ?></td>
                        <td scope="row" width="20"><?php echo $row['item_name']; ?></td>
                        <td scope="row" width="10">
                          <?php if ($row["status"]== '1') { ?>
                            <i class="fas fa-fw fa-circle fa-xs text-success"></i>&nbsp;Open
                          <?php } elseif ($row["status"]== '2') { ?>
                            <i class="fas fa-fw fa-circle fa-xs text-warning"></i>&nbsp;Pending
                          <?php } elseif ($row["status"]== '3') { ?>
                            <i class="fas fa-fw fa-circle fa-xs text-danger"></i>&nbsp;Rejected
                          <?php } elseif ($row["status"]== '4') { ?>
                            <i class="fas fa-fw fa-circle fa-xs text-info"></i>&nbsp;Re-Scheduled
                          <?php } elseif ($row["status"]== '5') { ?>
                            <i class="fas fa-fw fa-circle fa-xs text-secondary"></i>&nbsp;Closed
                          <?php } ?>
                        </td>
                        <td scope="row" width="50"><?php echo $row['remark']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="form-group row text-left mb-0 py-2">
                    <div class="col-sm-4 py-1"></div>
                    <div class="col-sm-3 py-1"></div>
                    <div div class="col-sm-5 py-1">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td><button class="btn btn-primary w-100">Open Chat</button></td>
                            <td><a href="track-ticket" class="btn btn-primary w-100">Close</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('user.footer.php'); ?>