<?php 
include('admin.header.php');
$ticket_num = $_GET['id'];
$query = mysqli_query($conn, "SELECT r.*, t.designation FROM `tbl_ticketreport` r LEFT JOIN `tbl_tickets` t ON r.ticket_num = t.ticket_num WHERE r.ticket_num = '$ticket_num'");
$ticket = mysqli_fetch_array($query);
?>

<div class="container-fluid">
    <h5 class="mb-4">Ticket Service Report Viewer</h5>

    <?php if (isset($_GET['msg'])) { ?>
        <div class="alert alert-success">
            <?php echo $_GET['msg']; ?>
            <a href="<?php echo $_GET['file']; ?>" target="_blank">Download PDF</a>
        </div>
    <?php } ?>

    <?php if ($ticket['designation'] == 1) { ?>
        <a href="generate-it-report?id=<?php echo $ticket_num; ?>" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Generate PDF
        </a>
    <?php } elseif ($ticket['designation'] == 2) { ?>
        <a href="generate-maintenance-report?id=<?php echo $ticket_num; ?>" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Generate PDF
        </a>
    <?php } ?>
</div>

<?php include('admin.footer.php'); ?>