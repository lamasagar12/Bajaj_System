<?php
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Add Social Page</h4>
                <a href="homepage.php" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php alertMessage(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="facebook">Facebook:</label>
                            <input type="text" name="facebook" required class="form-control" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="instagram">Instagram:</label>
                            <input type="text" name="instagram" required class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="twitter">Twitter:</label>
                            <input type="text" name="twitter" required class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="youtube">YouTube:</label>
                            <input type="text" name="youtube" required class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Disable, Checked=Active)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveSocial" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
