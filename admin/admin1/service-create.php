<?php
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Add New Bike Service</h4>
                <a href="service.php" class="btn btn-danger">Back to Services</a>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <?php alertMessage(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Service Name:</label>
                            <input type="text" name="name" required class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">Service Image:</label>
                            <input type="file" name="image" accept="image/*" required class="form-control"/>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" required class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Not-available, Checked=Available)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveService" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
