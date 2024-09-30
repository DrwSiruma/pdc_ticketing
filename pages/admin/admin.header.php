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
unset($_SESSION['success']);

$accounts_page = ['admin.add.user.php', 'admin.accounts.php'];
$outlet_page = ['admin.outlet.php', 'admin.add.outlet.php', 'admin.edit.outlet.php'];
$product_page = ['admin.products.php', 'admin.add.product.php', 'admin.edit.product.php'];
$pcategory_page = ['admin.product.category.php', 'admin.add.pcategory.php', 'admin.edit.pcategory.php']

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

                <li class="nav-item <?php echo in_array($page, ['admin/add-user', 'admin/edit-user', 'admin/users']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="users">
                        <i class="fas fa-fw fa-user fa-sm"></i>
                        <span>Registered Users</span>
                    </a>
                </li>

                <li class="nav-item <?php echo in_array($page, ['admin/add-category', 'admin/inventory']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="inventory">
                        <i class="fas fa-fw fa-boxes fa-sm"></i>
                        <span>Inventory</span>
                    </a>
                </li>

                <li class="nav-item <?php echo in_array($page, ['admin/add-it', 'admin/it']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="it">
                        <i class="fas fa-fw fa-user-secret fa-sm"></i>
                        <span>IT</span>
                    </a>
                </li>

                <li class="nav-item <?php echo in_array($page, ['admin/add-maintenance', 'admin/maintenance']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="maintenance">
                        <i class="fas fa-fw fa-user-cog fa-sm"></i>
                        <span>Maintenance</span>
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

                <li class="nav-item">
                    <a class="nav-link" href="technical-report">
                        <i class="fas fa-fw fa-file fa-sm"></i>
                        <span>Technical Reports</span>
                    </a>
                </li>
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