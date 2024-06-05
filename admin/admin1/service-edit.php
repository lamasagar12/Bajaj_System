<?php
include 'includes/header.php';

// Check if service ID is provided in the URL
if(isset($_GET['id'])) {
    $service_id = $_GET['id'];
    
    // Fetch service details from the database
    $sql = "SELECT * FROM services WHERE id = $service_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Bike Service</h4>
                <a href="service.php" class="btn btn-danger">Back to Services</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="service_id" value="<?= $service_id ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Service Name:</label>
                            <input type="text" name="name" value="<?= $service['name'] ?>" required class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">Service Image:</label>
                            <input type="file" name="image" accept="image/*" class="form-control"/>
                            <img src="uploads/<?= $service['image'] ?>" alt="<?= $service['name'] ?>" style="max-width: 100px; max-height: 100px;">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" required class="form-control" rows="3"><?= $service['description'] ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Not-available, Checked=Available)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?= $service['status'] == 1 ? 'checked' : '' ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateService" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    } else {
        echo '<div class="alert alert-danger">Service not found!</div>';
    }
} else {
    // If service ID is not provided, redirect back to services page
    header("Location: service.php");
    exit();
}

include 'includes/footer.php';
?>
