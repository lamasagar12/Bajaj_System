<?php include 'includer/header.php'; ?>

<style>
    .container-fluid1 {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .about-section {
        padding: 40px 0;
    }
    .about-section h1 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 2.5rem;
        color: #333;
    }
    .about-section h4 {
        font-size: 1.5rem;
        color: #007bff;
        margin-bottom: 15px;
    }
    .about-section p {
        font-size: 1rem;
        color: #555;
        line-height: 1.6;
    }
    .about-section img {
        margin-top: 15px;
        margin-bottom: 30px;
        border-radius: 8px;
        width: 100%;
        height: auto;
    }
    .alert-warning {
        text-align: center;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid1 px-4">
    <!-- Page Heading -->
    <div class="about-section">
        <h1>About Us</h1>
        <div class="row">
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                $aboutus = getAll('aboutus');
                if (mysqli_num_rows($aboutus) > 0):
                    foreach ($aboutus as $item):
                ?>
                <div class="row mb-5">
                    <div class="col-md-6 mb-4">
                        <h4>About Bajaj</h4>
                        <p><?= htmlspecialchars($item['about']) ?></p>
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image']) ?>" alt="About Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-4">
                        <h4>Our History</h4>
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image1']) ?>" alt="History Image" class="img-fluid">
                        <p><?= htmlspecialchars($item['history']) ?></p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-4">
                        <h4>Latest Technology</h4>
                        <p><?= htmlspecialchars($item['technology']) ?></p>
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image2']) ?>" alt="Technology Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-4">
                        <h4>Contribution to Nepal's Bike Community</h4>
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image3']) ?>" alt="Community Image" class="img-fluid">
                        <p><?= htmlspecialchars($item['community']) ?></p>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 mb-4">
                        <h4>Our Commitment</h4>
                        <p><?= htmlspecialchars($item['commitment']) ?></p>
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image4']) ?>" alt="Commitment Image" class="img-fluid">
                    </div>
                    <div class="col-md-6 mb-4">
                        <h4>Visit us Today</h4>
                        <p><?= htmlspecialchars($item['visitus']) ?></p>
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image5']) ?>" alt="Visit Us Image" class="img-fluid">
                    </div>
                </div>
                <?php 
                    endforeach;
                else:
                ?>
                <div class="alert alert-warning" role="alert">No Record found</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includer/footer.php'; ?>
