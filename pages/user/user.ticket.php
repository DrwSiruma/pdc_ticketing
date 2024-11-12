<?php include('user.header.php'); ?>

    <div class="container text-center my-5">
        <div id="raffle-red" class="entry raffle">
            <div class="no-scale"></div>
        </div>
        <h1 class="display-6 font-weight-bold"><i class="fas fa-check-circle text-success"></i>&nbsp;Ticket Successfully Opened</h1>
        <p class="lead">
            Your ticket has been successfully submitted! Your ticket number is <span style="font-weight: bold;"><?php echo $_GET['id']; ?></span>. Please save or make a note of this ticket for future reference, as it will be required to check the status of your ticket. Our team will review your request and keep you updated on the progress. Thank you for reaching out to us!
        </p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-2">
                <a href="dashboard" class="btn btn-primary2 btn-block">Back to home</a>
            </div>
        </div>
    </div>

<?php include('user.footer.php'); ?>