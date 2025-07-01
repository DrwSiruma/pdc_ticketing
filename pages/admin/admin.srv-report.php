<?php include('admin.header.php'); ?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Service Report Generator</h1>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form id="srvReportFilterForm" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="filter_date_from" class="form-label">Date From</label>
                    <input type="date" class="form-control" id="filter_date_from" name="date_from">
                </div>
                <div class="col-md-3">
                    <label for="filter_date_to" class="form-label">Date To</label>
                    <input type="date" class="form-control" id="filter_date_to" name="date_to">
                </div>
                <div class="col-md-2">
                    <label for="filter_department" class="form-label">Department</label>
                    <select class="form-control" id="filter_department" name="department">
                        <option value="">All</option>
                        <option value="1">IT</option>
                        <option value="2">Maintenance</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="filter_establishment" class="form-label">Establishment</label>
                    <input type="text" class="form-control" id="filter_establishment" name="establishment" placeholder="Type to search...">
                </div>
                <div class="col-md-2">
                    <label for="filter_personnel" class="form-label">Personnel</label>
                    <input type="text" class="form-control" id="filter_personnel" name="personnel" placeholder="Type to search...">
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                    <button type="button" class="btn btn-secondary" id="resetFilters">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="srvReportTable" class="table table-bordered table-striped w-100">
                    <thead>
                        <tr>
                            <th>Date Closed</th>
                            <th>Ticket #</th>
                            <th>Department</th>
                            <th>Establishment</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Personnel</th>
                            <th>Remarks</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="jquery3.6"></script>
<script>
$(document).ready(function() {
    var table = $('#srvReportTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'srv-report-data.php',
            type: 'POST',
            data: function(d) {
                d.date_from = $('#filter_date_from').val();
                d.date_to = $('#filter_date_to').val();
                d.department = $('#filter_department').val();
                d.establishment = $('#filter_establishment').val();
                d.personnel = $('#filter_personnel').val();
            }
        },
        columns: [
            { data: 'date_closed' },
            { data: 'ticket_num' },
            { data: 'department' },
            { data: 'establishment' },
            { data: 'category' },
            { data: 'item' },
            { data: 'personnel' },
            { data: 'remarks' },
            { data: 'actions', orderable: false, searchable: false }
        ],
        order: [[0, 'desc']]
    });

    $('#srvReportFilterForm').on('submit', function(e) {
        e.preventDefault();
        table.ajax.reload();
    });
    $('#resetFilters').on('click', function() {
        $('#srvReportFilterForm')[0].reset();
        table.ajax.reload();
    });
});
</script>

<?php include('admin.footer.php'); ?>