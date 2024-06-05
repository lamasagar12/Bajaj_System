<style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }
        .card-title {
            margin-top: auto;
        }
    </style>

    <div class="container p-4">
        <h1 style="text-align:center;">Bike Collection</h1>
        <div class="row">
        <?php
        $products = getAll1('products');
        if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item):
                if($item['status'] == 0): // Corrected the typo from 'ststus' to 'status'
        ?>
        <div class="col-lg-4 mb-4">
            <div class="card h-100">
                <img class="card-img-top" src="admin/admin1/uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                <div class="card-body mt-auto">
                    <h4 class="card-title mt-auto"><?= htmlspecialchars($item['name']) ?></h4>
                </div>
                <div class="card-footer">
                    <a href="product_detail.php?id=<?= htmlspecialchars($item['id']) ?>" class="btn btn-success btn-sm">Book now</a>
                </div>
            </div>
        </div>
        <?php
                endif; // Added closing endif here
            endforeach;
        } else {
        ?>
        <div class="col-lg-12">
            <div class="alert alert-warning" role="alert">
                No products found.
            </div>
        </div>
        <?php } ?>
        </div><!-- /.row -->
    </div><!-- /.container -->