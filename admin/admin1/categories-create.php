<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Add Category</h4>
                <a href="categories.php" class="btn btn-danger">Back</a> <!-- Button added back here -->
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" accept="image/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" required class="form-control"/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="description" required class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status (Unchecked=Visible, Checked=Hidden)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveCategory" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
