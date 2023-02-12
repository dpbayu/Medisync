<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'dashboard'){echo 'collapsed';} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if($page != 'profile'){echo 'collapsed';} ?>" href="profile.php">
                <i class="bi bi-file-earmark-person"></i>
                <span>Profile</span>
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