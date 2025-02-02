<?php 
include('admin.header.php');
$ticket_num = $_GET['id'];
?>

<div class="container-fluid">
    <h5 class="mb-4">Ticket Service Report Viewer</h5>

    <?php if (isset($_GET['msg'])) { ?>
        <div class="alert alert-success">
            <?php echo $_GET['msg']; ?>
            <a href="<?php echo $_GET['file']; ?>" target="_blank">Download PDF</a>
        </div>
    <?php } ?>

    <a href="generate-pdf?id=<?php echo $ticket_num; ?>" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Generate PDF
    </a>
</div>

<?php include('admin.footer.php'); ?>