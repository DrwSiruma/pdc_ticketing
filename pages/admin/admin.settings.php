<?php include('admin.header.php'); ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Settings</h1>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="mt-5 mb-2" width="150px" src="../../img/undraw_profile.svg">
                    <span class="font-weight-bold"><?php echo $_SESSION['name']; ?></span>
                    <span class="text-orange"><?php echo $_SESSION['role']; ?></span>
                </div>
            </div>

            <div class="col-md-5">
                <form method="post" action="edit-profile">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right text-pink"><i class="fas fa-user-edit"></i>&nbsp;Profile Settings</h4>
                        </div>
                        <?php if (!empty($_SESSION['profile-error'])) : ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['profile-error']; unset($_SESSION['profile-error']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['profile-success'])) : ?>
                            <div class="alert alert-success"><?php echo $_SESSION['profile-success']; unset($_SESSION['profile-success']); ?></div>
                        <?php endif; ?>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Username:</label>
                                <input type="text" class="form-control border border-primary" placeholder="Enter Username" name="uname" value="<?php echo $_SESSION['username']; ?>">
                            </div>
                        </div>

                        <div class="mt-3 text-center"><button class="btn btn-warning profile-button" type="submit" title="Update">Update Profile</button></div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <form method="post" action="update-adpassw">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right text-pink"><i class="fas fa-shield-alt"></i>&nbsp;Security Settings</h4>
                        </div>
                        <?php if (!empty($_SESSION['pass-error'])) : ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['pass-error']; unset($_SESSION['pass-error']); ?></div>
                        <?php endif; ?>
                        <?php if (!empty($_SESSION['pass-success'])) : ?>
                            <div class="alert alert-success"><?php echo $_SESSION['pass-success']; unset($_SESSION['pass-success']); ?></div>
                        <?php endif; ?>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Current Password:</label>
                                <input type="password" class="form-control border border-primary" name="current_password" id="current_password">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">New Password:</label>
                                <input type="password" class="form-control border border-primary" name="new_password" id="new_password">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Confirm Password:</label>
                                <input type="password" class="form-control border border-primary" name="confirm_password" id="confirm_password">
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="btn btn-warning profile-button" type="submit" title="Update">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include('admin.footer.php'); ?>