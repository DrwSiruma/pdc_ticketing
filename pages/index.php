<?php
// Get the 'page' from the URL, default to 'home' if not set
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Handle login form submission
if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'process.login.php';
    exit();
}

// Admin URL handling
if (strpos($page, 'admin/') === 0) {
    // Routes starting with 'admin/'
    $admin_page = str_replace('admin/', '', $page); // Remove 'admin/' prefix

    switch ($admin_page) {
        case 'dashboard':
            include 'admin/admin.dashboard.php'; // Admin dashboard page
            break;
        case 'users':
            include 'admin/admin.users.php'; // Admin accounts management
            break;
        case 'add-user':
            include 'admin/admin.add.user.php';
            break;
        case 'edit-user':
            include 'admin/admin.edit.user.php';
            break;
        case 'user-status':
            include 'admin/process.status.user.php';
            break;
        case 'logout':
            include '../includes/logout.php'; // Admin logout
            break;
        default:
            include 'admin/admin.dashboard.php'; // Default to admin dashboard
            break;
    }
} else {
    // Non-admin pages
    switch ($page) {
        case 'login':
            include 'login.php'; // Login page
            break;
        case 'track':
            include 'track.php'; // Track page
            break;
        default:
            include 'home.php'; // Default to home page
            break;
    }
}
?>