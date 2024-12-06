<?php 
    include('admin.header.php');
?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href="ticket" class="text-warning"><i class="far fa-times-circle"></i></a>&nbsp;Ticket # <span style="font-weight: 600;"><?php echo $_GET['id']; ?></span></h1>
        </div>

        <div></div>

    </div>

<?php include('admin.footer.php'); ?>