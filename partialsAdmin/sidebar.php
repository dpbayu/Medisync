<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Dashboard</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'dashboard') {echo 'collapsed';} ?>" href="../admin/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'patient') {echo 'collapsed';} ?>" href="../admin/dataPatient.php">
                <i class="bi bi-people"></i>
                <span>Data Patient</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'doctor') {echo 'collapsed';} ?>" href="../admin/dataDoctor.php">
                <i class="bi bi-diagram-2"></i>
                <span>Data Doctor</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'specialist') {echo 'collapsed';} ?>"
                href="../admin/dataSpecialist.php">
                <i class="bi bi-award"></i>
                <span>Data Specialist</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'medicine') {echo 'collapsed';} ?>" href="../admin/dataMedicine.php">
                <i class="bi bi-capsule"></i>
                <span>Data Medicine</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'poly') {echo 'collapsed';} ?>" href="../admin/dataPoly.php">
                <i class="bi bi-bounding-box"></i>
                <span>Data Poly</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'medical_record') {echo 'collapsed';} ?>"
                href="../admin/dataMedicalRecord.php">
                <i class="bi bi-box"></i>
                <span>Data Medical Record</span>
            </a>
        </li>
        <li class="nav-heading">Account</li>
        <li class="nav-item">
            <a class="nav-link <?php if ($page != 'profile') {echo 'collapsed';} ?>" href="../admin/profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
    </ul>
</aside>