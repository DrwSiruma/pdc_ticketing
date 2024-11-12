<?php include('user.header.php'); ?>

    <div class="container text-center my-5">
        <h1 class="display-6 font-weight-bold"><i class="fas fa-map-marker-alt"></i>&nbsp;Track My Ticket</h1>
        <p class="text-secondary">Please enter the Ticket number.</p>
        
        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)) : ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="track-ticket" method="post">
        <div class="search-container mt-4">
            <input class="input" name="ticket" type="text">
            <button type="submit" class="search-button">
                <svg viewBox="0 0 24 24" class="search__icon">
                    <g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                    </path></g>
                </svg>
            </button>
        </div>
        </form>
    </div>

<?php include('user.footer.php'); ?>