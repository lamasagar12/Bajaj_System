<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Add Product</h4>
                <a href="product.php" class="btn btn-danger">Back</a> <!-- Button added back here -->
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" accept="image/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" required class="form-control"/>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="price">Price (in Rs.)</label>
<div class="input-group mb-3">
    <span class="input-group-text">Rs.</span> <!-- This span ensures "Rs." always appears before the input -->
    <input type="text" name="price" class="form-control" required>
</div>

                        </div>
                        <div class="col-md-6 mb-3">
                        <label for="category">Category:</label><br>
<select name="category_id" class="form-select">
    <option value="">Select Category</option>
    <?php 
    $categories = getALL('categories');
    if($categories) {
        if(mysqli_num_rows($categories) > 0) {
            foreach($categories as $cateItem) {
                echo '<option value="'.$cateItem['id'].'">'.$cateItem['name'].'</option>';
            }
        } else {
            echo '<option value="">No Categories</option>'; // Fixed missing closing tag for options
        }
    } else {
        echo '<option value="">Something went wrong</option>'; // Fixed missing closing tag for options
    }
    ?>
</select>
  </div>
                        <div class="col-md-4 mb-3">
                        <label for="max_power">Engine_Capacity:</label>
<div class="input-group mb-3">
    <input type="text" name="engine_capacity" class="form-control" required>
    <span class="input-group-text">CC</span> <!-- This span ensures "bhp" always appears after the input -->
</div> </div>
                        <div class="col-md-4 mb-3">
                        <label for="max_power">Power:</label>
<div class="input-group mb-3">
    <input type="text" name="max_power" class="form-control" required>
    <span class="input-group-text">bhp</span> <!-- This span ensures "bhp" always appears after the input -->
</div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" required class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=In stock, Checked=Not In Stock)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveProduct" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
