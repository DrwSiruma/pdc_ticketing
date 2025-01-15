<?php
session_start();
include('../includes/connection.php');

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'outlet' && $_SESSION['role'] !== 'office')) {
    header("Location: /pdc_ticketing/pages/login");
    exit();
}

// Retrieve any error message from the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);

$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
unset($_SESSION['success']);
unset($_SESSION['success']);

// Query to count unread notifications
$notifcnt_qry = $conn->query("SELECT COUNT(*) AS unread_count FROM tbl_notif WHERE user_id = $_SESSION[id] AND status = '1'");

// Fetch the unread count
$unread_count = 0;
if ($notifcnt_qry) {
    $notifcnt_row = $notifcnt_qry->fetch_assoc();
    $unread_count = $notifcnt_row['unread_count'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panda Development Corp. - Support</title>

        <!-- Favicons -->
        <link href="../../img/favicon.png" rel="icon">
        <link href="../../img/favicon.png" rel="apple-touch-icon">

        <!-- VENDOR CSS -->
        <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="../../assets/vendor/datatables/jquery.dataTables.min.css" rel="stylesheet">
        <!-- MAIN CSS -->
        <link href="../../assets/css/user.style.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="dashboard">PDC SUPPORT</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item">
                            <a class="nav-link <?php //echo ($page == 'user/dashboard') ? 'active' : ''; ?>" aria-current="page" href="dashboard">Support Center Home</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page == 'user/open-ticket') ? 'active' : ''; ?>" href="open-ticket">Open a New Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo in_array($page, ['user/track-ticket', 'user/my-ticket', 'user/ticket-history']) ? 'active' : ''; ?>" href="track-ticket">Check Ticket Status</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link <?php //echo ($page == 'user/conversations') ? 'active' : ''; ?>" aria-current="page" href="conversations">Conversations&nbsp;<span class="badge bg-secondary text-light">99+</span></a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page == 'user/notification') ? 'active' : ''; ?>" aria-current="page" href="notification">Notifications&nbsp;
                                <?php if ($unread_count > 0) { ?>
                                    <span class="badge bg-secondary text-light">
                                        <?php echo ($unread_count > 99) ? '99+' : $unread_count; ?>
                                    </span>
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-user-circle"></i>&nbsp;<?php echo $_SESSION['name']; ?></a>
                        </li>
                        <li class="divider"></li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>