    <!-- Sidebar -->

    <!-- Sidebar - Brand -->

    <style>
        .img-profile {
            height: 70px;
            width: 70px;
        }

        #content-wrapper {
            background-image: url('gallery/admin.jpg');
            /* Replace 'path/to/your/image.jpg' with your image file path */
            background-size: cover;
            /* Adjusts the size of the background image to cover the entire body */
            /* You can also set other properties like background-repeat, background-position, etc. */
        }

        body {
            color: black;
        }
    </style>

    <!-- Divider -->
    <hr class="sidebar-divider  my-0">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Topbar Search -->


            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="user_index.php">
                <img class="img-profile rounded-circle" src="img/seal.png">
                <div class="sidebar-brand-text mx-1 font-weight-bold">Pototan Assesors</div>
            </a>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <h3 class="h6 mb-0 text-gray-800">Welcome User!</h3>
                            <?php echo $_SESSION['username']; ?>

                        </span>
                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Logout Modal-->
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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                        <form action="logout.php" method="POST">

                            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
