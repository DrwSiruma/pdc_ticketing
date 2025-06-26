         <!-- ======= Footer Section ======= -->
         <!-- <footer>
            <div class="text-center mt-3 mb-2">
                © 2024 Copyright: Panda Development Corporation.
            </div>
        </footer> -->
        <!-- ======= End Footer Section ======= -->
         <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <!-- VENDOR JS -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../../assets/vendor/datatables/jquery.dataTables.min.js" ></script>
    <!-- MAIN JS -->
    <script src="../../assets/js/user.js"></script>
    <script src="../../assets/js/table.js"></script>
    <?php echo ($page == 'user/conversations') ? '<script src="../../assets/js/convo.js"></script>' : ''; ?>
</html>