<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown no-arrow position">
        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span id="notif-indicator" class="position-absolute" style="display:none; top: 25%; right: 5%; width: 12px; height: 12px; background-color: red; border-radius: 50%; border: 2px solid white;"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notifDropdown" style="min-width: 350px; max-height: 400px; overflow-y: auto;">
            <div class="d-flex justify-content-between align-items-center px-3 py-2">
                <h3 class="dropdown-header text-dark p-0 m-0">Notifications</h3>
                <button class="btn btn-link btn-sm text-primary p-0" id="notif-mark-all-top" style="font-size: 0.7rem;">Mark all as read</button>
            </div>
            <div class="dropdown-divider"></div>
            <div id="notif-container">
                <div class="text-center small text-gray-500 py-2">Loading...</div>
            </div>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item text-center small text-primary" id="notif-mark-all">Mark all as read</button>
        </div>
    </li>
    <style>
        .notif-bg-even { background-color: #f8f9fa; }
        .notif-bg-odd { background-color: #e9ecef; }
    </style>
    <script>
        function loadNotifications() {
            fetch('notif-check')
                .then(response => response.json())
                .then(data => {
                    const indicator = document.getElementById('notif-indicator');
                    const container = document.getElementById('notif-container');
                    if (data.unread_notif > 0) {
                        indicator.style.display = 'inline-block';
                    } else {
                        indicator.style.display = 'none';
                    }
                    if (data.notifications && data.notifications.length > 0) {
                        container.innerHTML = '';
                        data.notifications.forEach(function(notif, idx) {
                            const notifItem = document.createElement('div');
                            notifItem.className = 'dropdown-item d-flex align-items-center justify-content-between ' + (idx % 2 === 0 ? 'notif-bg-even' : 'notif-bg-odd');
                            notifItem.innerHTML = `
                                <div>
                                    <div class="small text-gray-500">${notif.time}</div>
                                    <span>${notif.message}</span>
                                </div>
                                <!-- <button class="btn btn-sm btn-link text-primary notif-action-btn" data-id="${notif.id}"><i class="fas fa-eye"></i></button> -->
                            `;
                            container.appendChild(notifItem);
                        });
                    } else {
                        container.innerHTML = '<div class="text-center small text-gray-500 py-2">No notifications</div>';
                    }
                });
        }

        setInterval(loadNotifications, 2000);
        document.addEventListener('DOMContentLoaded', loadNotifications);

        // Action button event delegation
        document.addEventListener('click', function(e) {
            const notifBtn = e.target.closest('.notif-action-btn');
            if (notifBtn) {
                const notifId = notifBtn.getAttribute('data-id');
                fetch('admin.notif-action.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({id: notifId, action: 'mark_read'})
                }).then(() => loadNotifications());
                return;
            }
            if (e.target.id === 'notif-mark-all') {
                fetch('admin.notif-action.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({action: 'mark_all_read'})
                }).then(() => loadNotifications());
            }
        });
    </script>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
            <img class="img-profile rounded-circle"
                src="../../img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="settings">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
      
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>