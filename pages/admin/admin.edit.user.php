<?php
include('admin.header.php'); 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = $conn->prepare("SELECT * FROM tbl_useraccounts WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();
    $user = $result->fetch_assoc();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: users");
    exit();
}
?>

        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
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
                                <form method="post" action="edit-user">
                                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="name">Name :</label>
                                            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="username">Username :</label>
                                            <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="role">Role :</label>
                                            <select class="form-control" id="role" name="role">
                                                <!-- <option value="admin" <?php //if ($user['role'] == 'admin') echo 'selected'; ?> disable>Admin</option> -->
                                                <option value="it" <?php if ($user['role'] == 'it') echo 'selected'; ?>>IT</option>
                                                <option value="maintenance" <?php if ($user['role'] == 'maintenance') echo 'selected'; ?>>Maintenance</option>
                                                <option value="office" <?php if ($user['role'] == 'office') echo 'selected'; ?>>Office</option>
                                                <option value="outlet" <?php if ($user['role'] == 'outlet') echo 'selected'; ?>>Outlet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="Active" <?php if ($user['status'] == 'Active') echo 'selected'; ?>>Active</option>
                                                <option value="Inactive" <?php if ($user['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-center"><button class="btn btn-warning" type="submit" title="Update">Update Profile</button></div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right text-pink"><i class="fas fa-shield-alt"></i>&nbsp;Reset Password</h4>
                                </div>
                                <?php if (!empty($_SESSION['password-error'])) : ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['password-error']; unset($_SESSION['password-error']); ?></div>
                                <?php endif; ?>
                                <?php if (!empty($_SESSION['password-success'])) : ?>
                                    <div class="alert alert-success"><?php echo $_SESSION['password-success']; unset($_SESSION['password-success']); ?></div>
                                <?php endif; ?>
                                <form method="post" action="update-userpassw">
                                    <input type="hidden" name="pid" value="<?php echo $user['id']; ?>">
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">New Password:</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Confirm Password:</label>
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                        </div>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <button class="btn btn-warning profile-button" type="submit" title="Reset Password">Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

<?php include('admin.footer.php'); ?>