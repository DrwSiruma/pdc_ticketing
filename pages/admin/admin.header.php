<?php
session_start();
include('../includes/connection.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /pdc_ticketing/pages/login");
    exit();
} 

// Retrieve any error message from the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);

$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['success']);

$ticketcnt_qry = $conn->query("SELECT COUNT(*) AS ticket_count FROM tbl_tickets WHERE status = '1' OR status = '2' OR status = '4'");

$unread_count = 0;
if ($ticketcnt_qry) {
    $ticketcnt_res = $ticketcnt_qry->fetch_assoc();
    $ticket_cnt = $ticketcnt_res['ticket_count'];
}

?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panda Development Corp. - Admin</title>

        <!-- Favicons -->
        <link href="../../img/favicon.png" rel="icon">
        <link href="../../img/favicon.png" rel="apple-touch-icon">

        <!-- VENDOR CSS -->
        <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="../../assets/vendor/datatables/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- MAIN CSS -->
        <link href="../../assets/css/main.style.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                    <div class="sidebar-brand-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3" style="color: #FFD700;">ADMIN PANEL</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item <?php echo ($page == 'admin/dashboard') ? 'active' : ''; ?>">
                    <a class="nav-link" href="dashboard">
                        <i class="fas fa-fw fa-tachometer-alt fa-sm"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Interface
                </div>

                <li class="nav-item <?php echo in_array($page, ['admin/ticket', 'admin/view-ticket', 'admin/ticket-approval', 'admin/edit-report', 'admin/view-report']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="ticket">
                        <i class="fas fa-fw fa-ticket-alt fa-sm"></i>
                        <span>Tickets&nbsp;
                            <span id="ticket-count-indicator" class="badge bg-secondary text-light" style="display:none;"></span>
                        </span>
                        <script>
                            setInterval(function() {
                                fetch('admin.chk-ticket-count.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const badge = document.getElementById('ticket-count-indicator');
                                        if (data.count > 0) {
                                            badge.textContent = (data.count > 99) ? '99+' : data.count;
                                            badge.style.display = 'inline-block';
                                        } else {
                                            badge.style.display = 'none';
                                        }
                                    });
                            }, 3000); // every 3 seconds
                        </script>
                    </a>
                </li>

                <li class="nav-item <?php echo in_array($page, ['admin/add-user', 'admin/edit-user', 'admin/users']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="users">
                        <i class="fas fa-fw fa-user fa-sm"></i>
                        <span>Registered Users</span>
                    </a>
                </li>

                <li class="nav-item <?php echo in_array($page, ['admin/add-category', 'admin/help-categories','admin/item-list', 'admin/add-itemlist']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="help-categories">
                        <i class="fas fa-fw fa-question-circle fa-sm"></i>
                        <span>Help Category</span>
                    </a>
                </li>

                <li class="nav-item <?php echo in_array($page, ['admin/personnels', 'admin/it']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="personnels">
                        <i class="fas fa-fw fa-user-cog fa-sm"></i>
                        <span>Support Staff</span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Reports
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="service-report">
                        <i class="fas fa-fw fa-file fa-sm"></i>
                        <span>Service Reports</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="technical-report">
                        <i class="fas fa-fw fa-file fa-sm"></i>
                        <span>Technical Reports</span>
                    </a>
                </li> -->
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                    <?php include_once('admin.topbar.php');?>
                    <!-- End of Topbar -->