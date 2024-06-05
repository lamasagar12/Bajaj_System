<?php
include 'includes/header.php';
?>
<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Location</h4>
                <a href="location.php" class="btn btn-danger">Back to Locations</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                    // Retrieve location data to populate the form
                    if (isset($_GET['id'])) {
                        $locationID = validate($_GET['id']);
                        $location = getById('locations', $locationID);
                        if ($location['status'] == 200) {
                            $locationData = $location['data'];
                ?>
                <form action="code.php" method="POST">
                    <div class="row">
                        <input type="hidden" name="locationID" value="<?= htmlspecialchars($locationID) ?>">
                        <div class="col-md-6 mb-3">
                            <label for="address">Address:</label>
                            <input type="text" name="address" value="<?= htmlspecialchars($locationData['address']) ?>" class="form-control" required/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($locationData['email']) ?>" class="form-control" required/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" value="<?= htmlspecialchars($locationData['phone']) ?>" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="website">Website:</label>
                            <input type="text" name="website" value="<?= htmlspecialchars($locationData['website']) ?>" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="opentime">Open Time:</label>
                            <input type="text" name="opentime" value="<?= htmlspecialchars($locationData['opentime']) ?>" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="closetime">Close Time:</label>
                            <input type="text" name="closetime" value="<?= htmlspecialchars($locationData['closetime']) ?>" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Active, Checked=Disable)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?php if($locationData['status'] == 1) echo 'checked'; ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateLocation" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <?php 
                        } else {
                            echo '<div class="alert alert-danger">Location not found!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Location ID not provided!</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
