<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'dashboard') {echo 'collapsed';} ?>" href="../owner/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'patient') {echo 'collapsed';} ?>" href="../owner/dataPatient.php">
                <i class="bi bi-people"></i>
                <span>Data Patient</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'doctor') {echo 'collapsed';} ?>" href="../owner/dataDoctor.php">
                <i class="fa fa-user-md"></i>
                <span>Data Doctor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'medicine') {echo 'collapsed';} ?>" href="../owner/dataMedicine.php">
                <i class="fa fa-medkit"></i>
                <span>Data Medicine</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'poly') {echo 'collapsed';} ?>" href="../owner/dataPoly.php">
                <i class="bi bi-bounding-box"></i>
                <span>Data Poly</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'specialist') {echo 'collapsed';} ?>"
                href="../owner/dataSpecialist.php">
                <i class="fa fa-hospital-o"></i>
                <span>Data Specialist</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'medical_record') {echo 'collapsed';} ?>"
                href="../owner/dataMedicalRecord.php">
                <i class="bi bi-box"></i>
                <span>Data Medical Record</span>
            </a>
        </li>
        <li class="nav-heading">Staff</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'admin') {echo 'collapsed';} ?>" href="../owner/dataAdmin.php">
                <i class="bi bi-person"></i>
                <span>Data Admin</span>
            </a>
        </li>
        <li class="nav-heading">Account</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'profile') {echo 'collapsed';} ?>" href="../owner/profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>
</aside>