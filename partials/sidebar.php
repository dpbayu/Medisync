<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'dashboard'){echo 'collapsed';} ?>" href="../admin/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'patient'){echo 'collapsed';} ?>" href="../patient/data.php">
                <i class="bi bi-people"></i>
                <span>Data Patient</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'doctor'){echo 'collapsed';} ?>" href="../doctor/data.php">
                <i class="bi bi-diagram-2"></i>
                <span>Data Doctor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'medicine'){echo 'collapsed';} ?>" href="../medicine/data.php">
                <i class="ri-medicine-bottle-line"></i>
                <span>Data Medicine</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'poly'){echo 'collapsed';} ?>" href="../poly/data.php">
                <i class="bi bi-bounding-box"></i>
                <span>Data Poly</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'medical_record'){echo 'collapsed';} ?>" href="../medical_record/data.php">
                <i class="bi bi-box"></i>
                <span>Data Medical Record</span>
            </a>
        </li>
        <li class="nav-heading">Account</li>
    </ul>
</aside>