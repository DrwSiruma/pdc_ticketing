<?php 
    include('admin.header.php');
?>
    <style>
        label {
            font-weight: 500;
        }
    </style>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><a href="ticket" class="text-danger"><i class="far fa-times-circle"></i></a>&nbsp;Ticket # <span style="font-weight: 600;"><?php echo $_GET['id']; ?></span></h1>
        </div>

        <div class="card mt-4">
            <div class="card-header" style="background-color: #fff;">
                <h5><i class="fas fa-info-circle"></i>&nbsp;Ticket Summary</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from">From:</label>
                                        <input type="text" name="from" id="from" class="form-control" value="Outlet" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date-posted">Date Posted:</label>
                                        <input type="datetime-local" name="date-posted" id="date-posted" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Ticket State:</label>
                                        <input type="text" name="status" id="status" class="form-control" value="Pending" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dept">Department:</label>
                                        <input type="text" name="dept" id="dept" class="form-control" value="Department" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categ">Topic Category:</label>
                                        <input type="text" name="categ" id="categ" class="form-control" value="Category" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item">Topic Item:</label>
                                        <input type="text" name="item" id="item" class="form-control" value="Item" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

<?php include('admin.footer.php'); ?>