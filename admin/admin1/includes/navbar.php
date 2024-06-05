<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-0 static-top shadow">
    <!-- Logo and Brand -->
    <a class="navbar-brand d-flex align-items-center justify-content-center" href="index.ht" href="#">
      <img src="assets/img/bajajlogo1.png" alt="Logo" class="img-fluid" style="max-height: 40px; filter: invert(1);">
      <div class="sidebar-brand-text text-light mx-3" style="font-weight:700; font-size:30px;">BAJAJ BHAKATAPUR</div>
    </a>
    
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar - Right Side -->
    <ul class="navbar-nav ml-auto">
        <!-- Topbar User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <span class="ml-2 d-none d-lg-inline m-3 text-white-600"> <i class="fas fa-user-circle fa-2x"><?= $_SESSION['LoggedInUser']['Firstname'] ?></i></span>  
            </a>
            <!-- Dropdown - User Information -->
            <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <li><a href="#!"class="dropdown-item">Setting</a></li>
                <li><a href="#!"class="dropdown-item">Activity</a></li>
                <li><hr class="dropdown-divider"/></li>
                <li><a href="../logout.php"class="dropdown-item">LogOut</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->
