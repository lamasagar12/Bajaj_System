<nav class="navbar navbar-expand navbar-light bg-primary topbar mb-0 static-top shadow">
    <a class="navbar-brand d-flex align-items-center justify-content-center" href="index.ht" href="#">
        <img src="assets/img/bajajlogo1.png" alt="Logo" class="img-fluid" style="max-height: 40px; filter: invert(1);">
        <div class="sidebar-brand-text text-light mx-3" style="font-weight:700; font-size:30px;">BAJAJ BHAKATAPUR</div>
    </a>

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                <span class="ml-2 d-none d-lg-inline m-3" style="font-size: 30px; font-weight: bold;">
                    <?= $_SESSION['LoggedInUser']['Firstname'] ?>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <li><a href="../logout.php" class="dropdown-item">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
