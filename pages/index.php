<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'process.login.php';
    exit();
}

if (strpos($page, 'admin/') === 0) {
    $admin_page = str_replace('admin/', '', $page);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        switch ($admin_page) {
            case 'edit-profile':
                include 'admin/process.profile-edit.php';
                break;
            case 'update-adpassw':
                include 'admin/process.admin-passw.php';
                break;
            case 'add-user':
                include 'admin/process.register.php';
                break;
            case 'edit-user':
                include 'admin/process.edit.user.php';
                break;
            case 'update-userpassw':
                include 'admin/process.reset.php';
                break;
            case 'add-category':
                include 'admin/process.add-category.php';
                break;
            case 'edit-category':
                include 'admin/process.edit-categ.php';
                break;
            case 'add-itemlist':
                include 'admin/process.add-itemlist.php';
                break;
            case 'ticket-approval':
                include 'admin/process.ticket-approval.php';
                break;
            case 'reject-ticket':
                include 'admin/process.ticket-decline.php';
                break;
            case 'resched-ticket':
                include 'admin/process.resched-ticket.php';
                break;
            case 'reassign-ticket':
                include 'admin/process.reassign-ticket.php';
                break;
            case 'edit-tc':
                include 'admin/process.edit-tc.php';
                break;
            case 'edit-pl':
                include 'admin/process.edit-pl.php';
                break;
        }
    } else {
        switch ($admin_page) {
            case 'dashboard':
                include 'admin/admin.dashboard.php';
                break;
            case 'ticket':
                include 'admin/admin.ticket.php';
                break;
            case 'users':
                include 'admin/admin.users.php';
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
            case 'settings':
                include 'admin/admin.settings.php';
                break;
            case 'profile':
                include 'admin/admin.profile.php';
                break;
            case 'help-categories':
                include 'admin/admin.help-category.php';
                break;
            case 'add-category':
                include 'admin/admin.add-category.php';
                break;
            case 'edit-category':
                include 'admin/admin.edit-categ.php';
                break;
            case 'status-categ':
                include 'admin/process.categ-status.php';
                break;
            case 'item-list':
                include 'admin/admin.item-list.php';
                break;
            case 'status-item':
                include 'admin/process.item-status.php';
                break;
            case 'personnels':
                include 'admin/admin.staff-list.php';
                break;
            case 'view-ticket':
                include 'admin/admin.view-ticket.php';
                break;
            case 'ticket-approval':
                include 'admin/admin.ticket-approval.php';
                break;
            case 'edit-report':
                include 'admin/admin.edit-report.php';
                break;
            case 'logout':
                include '../includes/logout.php';
                break;
            default:
                include 'admin/admin.dashboard.php';
                break;
        }
    }
} elseif (strpos($page, 'user/') === 0) {
    $user_page = str_replace('user/', '', $page);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        switch ($user_page) {
            case 'edit-profile':
                include 'user/process.profile-edit.php';
                break;
            case 'open-ticket':
                include 'user/process.open-ticket.php';
                break;
            case 'track-ticket':
                include 'user/process.track-ticket.php';
                break;
        }
    } else {
        switch ($user_page) {
            case 'dashboard':
                include 'user/user.dashboard.php';
                break;
            case 'open-ticket':
                include 'user/user.open-ticket.php';
                break;
            case 'ticket':
                include 'user/user.ticket.php';
                break;
            case 'track-ticket':
                include 'user/user.track-ticket.php';
                break;
            case 'my-ticket':
                include 'user/user.my-ticket.php';
                break;
            case 'ticket-history':
                include 'user/user.ticket-history.php';
                break;
            case 'conversations':
                include 'user/user.conversations.php';
                break;
            case 'notification':
                include 'user/user.notification.php';
                break;
            case 'mark-read':
                include 'user/process.mark-read.php';
                break;
            case 'mark-all-read':
                include 'user/process.mark-all-read.php';
                break;
            case 'logout':
                include '../includes/logout.php';
                break;
            default:
                include 'user/user.dashboard.php';
                break;
        }
    }
}else {
    switch ($page) {
        case 'login':
            include 'login.php';
            break;
        case 'track':
            include 'track.php';
            break;
        default:
            include 'home.php';
            break;
    }
}
?>