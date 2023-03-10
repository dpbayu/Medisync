<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'dashboard'){echo 'collapsed';} ?>" href="../doctor/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'medicine'){echo 'collapsed';} ?>" href="../doctor/dataMedicine.php">
                <i class="ri-medicine-bottle-line"></i>
                <span>Data Medicine</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'medical_record'){echo 'collapsed';} ?>"
                href="../doctor/dataMedicalRecord.php">
                <i class="bi bi-box"></i>
                <span>Data Medical Record</span>
            </a>
        </li>
        <li class="nav-heading">Account</li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'profile'){echo 'collapsed';} ?>" href="../doctor/profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>
</aside>