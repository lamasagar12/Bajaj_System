<?php
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Add Terms Page</h4>
                <a href="terms.php" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php alertMessage(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" required class="form-control" />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" required class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveTitle" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
