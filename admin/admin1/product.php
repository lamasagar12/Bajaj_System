<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width:auto;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Products</h4>
                <a href="product-create.php" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Engine Capacity</th>
                                <th>Max Power</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $products = getAll1('products');
                            if(mysqli_num_rows($products) > 0):
                                foreach($products as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['id']) ?></td>
                                        <td><img src="uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="max-width: 45px; max-height: 45px;"></td>
                                        <td><?= htmlspecialchars($item['name']) ?></td>
                                        <td>Rs.<?= htmlspecialchars($item['price']) ?></td>
                                        <td><?= htmlspecialchars($item['category_name']) ?></td>
                                        <td><?= htmlspecialchars($item['engine_capacity']) ?>CC</td>
                                        <td><?= htmlspecialchars($item['max_power']) ?>bhp</td>
                                        <td><?= htmlspecialchars($item['description']) ?></td>
                                        <td>
                                            <?php if ($item['status'] == 1): ?>
                                                <span class="badge bg-danger">Not In stock</span>
                                            <?php else: ?>
                                                <span class="badge bg-info">In stock</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                        <a href="product-edit.php?id=<?=$item['id'];?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="product-del.php? id=<?=$item['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                                    </tr>
                                <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="10">No Record found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Content -->

<?php include 'includes/footer.php'; ?>
