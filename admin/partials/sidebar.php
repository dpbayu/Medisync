<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'dashboard'){echo 'collapsed';} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'patient'){echo 'collapsed';} ?>" href="patient.php">
                <i class="bi bi-people"></i>
                <span>Patient</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if($page != 'doctor'){echo 'collapsed';} ?>" href="doctor.php">
                <i class="bi  bi-diagram-2"></i>
                <span>Doctor</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php if($page != 'account'){echo 'collapsed';} ?>" href="account.php">
                <i class="bi  bi-person"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</aside>