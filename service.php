<?php include 'includer/header.php';?>
<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-10px);
    }
    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }
    .card-title {
        margin-top: 10px;
        text-align: center;
        font-size: 1.25rem;
        font-weight: 500;
        color: #333;
    }
    .card-img-top {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-bottom: 15px;
    }
    .footer1 {
        text-align: center;
        padding-bottom: 15px;
    }
    .link {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.2s ease-in-out;
    }
    .link:hover {
        color: #0056b3;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .alert-warning {
        text-align: center;
    }
</style>

<div class="container p-4">
    <h1 style="text-align:center;">Our Services</h1>
    <div class="row">
        <?php
        $services = getAll('services');
        if (mysqli_num_rows($services) > 0):
            $activeFound = false;
            foreach ($services as $item):
                if ($item['status'] == 0):
                    $activeFound = true;
        ?>
        <div class="col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <img class="card-img-top" src="admin/admin1/uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <h4 class="card-title"><?= htmlspecialchars($item['name']) ?></h4>
                </div>
                <div class="footer1">
                    <a href="service-detail.php?id=<?= htmlspecialchars($item['id']) ?>" class="link">Explore</a>
                </div>
            </div>
        </div>
        <?php
                endif;
            endforeach;
            if (!$activeFound):
        ?>
        <div class="col-lg-12">
            <div class="alert alert-warning" role="alert">
                No active services found.
            </div>
        </div>
        <?php
            endif;
        else:
        ?>
        <div class="col-lg-12">
            <div class="alert alert-warning" role="alert">
                No services found.
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<section><?php include 'includer/footer.php';?></section>
