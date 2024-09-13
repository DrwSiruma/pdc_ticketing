<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home'; // Default to 'home' page if no specific page is requested
}

// Handle login form submission
if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'process.login.php';
    exit();
}

// Include the appropriate page based on the rewritten URL
switch ($page) {
    case 'login':
        include 'login.php';
        break;
    case 'tack':
        include 'track.php';
        break;
    case 'admin/dashboard':
        include 'admin/admin.dashboard.php'; // Admin dashboard page
        break;
    case 'admin/logout':
        include '../includes/logout.php'; // Admin dashboard page
        break;
    default:
        include 'home.php'; // default page
        break;
}
?>