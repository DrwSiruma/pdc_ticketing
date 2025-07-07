<?php
include('admin.header.php');
include_once '../includes/connection.php';

// Get staff id and role from GET
$staff_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$role = isset($_GET['role']) ? intval($_GET['role']) : 0; // 1=IT, 2=Maintenance

if (!$staff_id || !$role) {
    echo '<div class="alert alert-danger">Invalid staff selection.</div>';
    echo '<a href="personnels" class="btn btn-secondary mt-3">Go Back</a>';
    include('admin.footer.php');
    exit;
}

// Get staff info
$staff_q = mysqli_query($conn, "SELECT * FROM tbl_useraccounts WHERE id = $staff_id");
$staff = mysqli_fetch_assoc($staff_q);
if (!$staff) {
    echo '<div class="alert alert-danger">Staff not found.</div>';
    echo '<a href="personnels" class="btn btn-secondary mt-3">Go Back</a>';
    include('admin.footer.php');
    exit;
}

// Query open tickets assigned to this staff
$tickets_q = mysqli_query($conn, "SELECT t.*, t.status AS ticket_status, u.name as requested_by, r.status as report_status FROM tbl_tickets t LEFT JOIN tbl_useraccounts u ON t.assigned = u.id LEFT JOIN tbl_ticketreport r ON t.ticket_num = r.ticket_num WHERE t.assigned = $staff_id AND t.status = '1' OR t.status = '4'");

?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Assigned Tickets for <?php echo htmlspecialchars($staff['name']); ?> (<?php echo ($role == 1 ? 'IT' : 'Maintenance'); ?>)</h1>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <a href="personnels" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Go Back</a>
            <div class="table-responsive">
                <table class="table table-bordered w-100" id="assignedTicketsTable">
                    <thead>
                        <tr>
                            <th>Ticket #</th>
                            <th>Requested By</th>
                            <th>Subject</th>
                            <th>Date Filed</th>
                            <th>Status</th>
                            <th>Report Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_assoc($tickets_q)) { 
                                if ($row["ticket_status"]== '1') {
                                    $ticket_status = "Open";
                                } elseif ($row["status"]== '2') {
                                    $ticket_status = "Pending";
                                } elseif ($row["status"]== '3') {
                                    $ticket_status = "Rejected";
                                } elseif ($row["status"]== '4') {
                                    $ticket_status = "Re-Scheduled";
                                } elseif ($row["status"]== '5') {
                                    $ticket_status = "Closed";
                                }
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['ticket_num']); ?></td>
                            <td><?php echo htmlspecialchars($row['requested_by']); ?></td>
                            <td><?php echo htmlspecialchars($row['categ_name']) . ' - ' . htmlspecialchars($row['item_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_posted']); ?></td>
                            <td><?php echo htmlspecialchars($ticket_status); ?></td>
                            <td><?php echo htmlspecialchars($row['report_status'] ?? '-'); ?></td>
                            <!-- <td>
                                <a href="admin.ticket-data.php?ticket_num=<?php echo urlencode($row['ticket_num']); ?>" class="btn btn-sm btn-info" title="View Ticket"><i class="fas fa-eye"></i> View</a>
                            </td> -->
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('admin.footer.php'); ?>
