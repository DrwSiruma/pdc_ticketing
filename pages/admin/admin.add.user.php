<?php include('admin.header.php'); ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h2 class="h4 text-center mb-4 text-dark">Add New User</h2>
                <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($success)) : ?>
                    <div class="alert alert-success text-center"><?php echo $success; ?></div>
                <?php endif; ?>
                <form action="add-user" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label fw-semibold">Role</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            <select class="form-control" id="role" name="role" required>
                                <option value="" hidden>Select Role</option>
                                <option value="admin">System Admin</option>
                                <option value="it-admin">IT - Admin</option>
                                <option value="maintenance-admin">Maintenance - Admin</option>
                                <option value="office">Office</option>
                                <option value="outlet">Outlet</option>
                                <option value="it">IT - Personnel</option>
                                <option value="maintenance">Maintenance - Personnel</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 fw-bold py-2 mt-2">Register</button>
                    <div class="text-center mt-3">
                        <a href="users" class="text-decoration-none text-secondary">Back to User Accounts</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 575.98px) {
    .card-body { padding: 1rem !important; }
    .card { border-radius: 1rem !important; }
    .form-label { font-size: 1em; }
}
</style>

<?php include('admin.footer.php'); ?>