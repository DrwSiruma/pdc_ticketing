<?php include('header.php'); ?>

    <div class="login-form">
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form id="loginForm" action="process-login.php" method="post">
            <div class="row">
                <div class="col-md-6 col-sm-12">

                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="mb-3 input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="userId" name="username" placeholder="User ID" required>
                    </div>
                    <div class="mb-3 input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <span class="input-group-text" id="togglePassword"><i class="far fa-eye"></i></span>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn w-100 mb-3 btn-primary btn-block">Login</button>
                </div>
            </div>
        </form>
    </div>

<?php include('footer.php'); ?>