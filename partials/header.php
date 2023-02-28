<header id="header" class="header fixed-top d-flex align-items-center">
    <!-- Logo Start -->
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">E-CURE</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- Logo End -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <!-- Profile Image Start -->
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
<<<<<<< HEAD
                    <img src="../admin/img/<?php echo $_SESSION['user_profile'] ?>" alt="Profile" class="rounded-circle" width="40" height="100">
=======
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
>>>>>>> parent of ce5365f (admin finish)
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['fullname'] ?></span>
                </a>
                <!-- Profile Image End -->
                <!-- Profile Dropdown Start -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $_SESSION['fullname'] ?></h6>
<<<<<<< HEAD
                        <span><?= $_SESSION['role'] ?></span>
=======
                        <span>Web Designer</span>
>>>>>>> parent of ce5365f (admin finish)
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
<<<<<<< HEAD
                        <a class="dropdown-item d-flex align-items-center" href="profile.php">
=======
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
>>>>>>> parent of ce5365f (admin finish)
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
                <!-- Profile Dropdown End -->
            </li>
        </ul>
    </nav>
</header>