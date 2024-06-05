<?php
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Contact Us</h4>
                <a href="location.php" class="btn btn-danger">Back to Contact Us</a>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST">
                    <?php alertMessage(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="address">Address:</label>
                            <input type="text" name="address" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="website">Website:</label>
                            <input type="text" name="website" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="opentime">Open Time:</label>
                            <input type="text" name="opentime" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="closetime">Close Time:</label>
                            <input type="text" name="closetime" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Disable, Checked=Active)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveLocation" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
