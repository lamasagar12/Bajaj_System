<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Edit Category</h4>
                <a href="categories.php" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                    // Retrieve category data to populate the form
                    if (isset($_GET['id'])) {
                        $categoryID = $_GET['id'];
                        $categories = getById('categories', $categoryID);
                        if ($categories['status'] == 200) {
                            $categoriesData = $categories['data'];
                ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="categoryID" value="<?= $categoryID ?>">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control"/>
                            <?php if (!empty($categoriesData['image'])): ?>
                                <img src="uploads/<?= $categoriesData['image'] ?>" alt="Category Image" style="max-width: 200px; margin-top: 10px;">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="<?= $categoriesData['name'] ?>" class="form-control"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="3"><?= $categoriesData['description'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Visible, Checked=Hidden)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?= $categoriesData['status'] == 1 ? 'checked' : '' ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateCategory" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <?php 
                        } else {
                            echo '<div class="alert alert-danger">Category not found!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Category ID not provided!</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
