<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Edit Product</h4>
                <a href="product.php" class="btn btn-danger">Back</a> <!-- Button added back here -->
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                    // Retrieve product data to populate the form
                    if(isset($_GET['id'])) {
                        $productId = $_GET['id'];
                        $product = getById('products', $productId);
                        if($product['status'] == 200) {
                            $productData = $product['data'];
                ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="productId" value="<?=$productId?>">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control"/>
                            <?php if(!empty($productData['image'])): ?>
                            <img src="uploads/<?=$productData['image']?>" alt="Product Image" style="max-width: 200px; margin-top: 10px;">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="<?=$productData['name']?>" class="form-control"/>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="price">Price (in Rs.)</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs.</span> 
                                <input type="text" name="price" value="<?=$productData['price']?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="category">Category:</label><br>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                <?php 
                                $categories = getAll('categories');
                                if($categories && mysqli_num_rows($categories) > 0) {
                                    while($cateItem = mysqli_fetch_assoc($categories)) {
                                        $selected = ($cateItem['id'] == $productData['category_id']) ? 'selected' : '';
                                        echo '<option value="'.$cateItem['id'].'" '.$selected.'>'.$cateItem['name'].'</option>';
                                    }
                                } else {
                                    echo '<option value="">No Categories</option>'; 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="engine_capacity">Engine Capacity:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="engine_capacity" value="<?=$productData['engine_capacity']?>" class="form-control" required>
                                <span class="input-group-text">CC</span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="max_power">Max Power:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="max_power" value="<?=$productData['max_power']?>" class="form-control" required>
                                <span class="input-group-text">bhp</span>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="3"><?=$productData['description']?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=In stock, Checked=Not In Stock)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?php if($productData['status'] == 1) echo 'checked'; ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <?php 
                        } else {
                            echo '<div class="alert alert-danger">Product not found!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Product ID not provided!</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
