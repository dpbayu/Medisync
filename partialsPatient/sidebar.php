<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'dashboard') {echo 'collapsed';} ?>" href="../patient/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'appointment') {echo 'collapsed';} ?>"
                href="../patient/appointment.php">
                <i class="bi bi-exclude"></i>
                <span>Book Appointment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'invoice') {echo 'collapsed';} ?>"
                href="../patient/invoice.php">
                <i class="bi bi-stickies"></i>
                <span>Invoice</span>
            </a>
        </li>
        <li class="nav-heading">Account</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'profile') {echo 'collapsed';} ?>" href="../patient/profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>
</aside>