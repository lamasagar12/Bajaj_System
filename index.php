<?php include 'includer/header.php'; ?>

<section class="home" id="home">
    <style>
      
    </style>
    <div class="home-content">
        <h1>Bajaj Motors</h1>
        <h3>NS PULSAR</h3>
        <?php 
            // Fetch images from the "homepage" table
            $homepage = getAll('homepage');
            if(mysqli_num_rows($homepage) > 0):
                foreach($homepage as $item): 
            ?>
        <p><?= htmlspecialchars($item['description']) ?>
        </p>
        <?php 
                endforeach;
            else:
            ?>
                <p>No images found</p>
            <?php endif; ?>
    </div>
    <div class="home-img">
        <div class="rhombus">
            <?php 
            // Fetch images from the "homepage" table
            $homepage = getAll('homepage');
            if(mysqli_num_rows($homepage) > 0):
                foreach($homepage as $item): 
            ?>
                <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <?php 
                endforeach;
            else:
            ?>
                <p>No images found</p>
            <?php endif; ?>
        </div>
    </div>
</section>



<?php include 'includer/footer.php'; ?>
