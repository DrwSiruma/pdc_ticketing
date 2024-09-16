<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800">Add New User</h1>

        <div class="card mt-4">
            <div class="card-body">
                <div class="container">
                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($success)) : ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <form action="process.register.php" class="mt-2 mb-2" method="post">
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" hidden>Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="it">IT</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="office">Office</option>
                                <option value="outlet">Outlet</option>
                            </select>
                        </div>
                        <button type="submit" class="btn w-100 btn-warning btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('admin.footer.php'); ?>