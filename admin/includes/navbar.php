<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center justify-content-center" href="index.ht" href="#">
      <img src="admin1/assets/img/bajajlogo1.png" alt="Logo" class="img-fluid" style="max-height: 40px; filter: invert(1);">
      <div class="sidebar-brand-text text-light mx-3" style="font-weight:700; font-size:30px;">BAJAJ BHAKATAPUR</div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <?php if(isset($_SESSION['LoggedIn'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= $_SESSION['LoggedInUser']['Firstname'] ?></a> 
          <li class="nav-item">
            <a class="btn btn-danger" href="./logout.php">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
