<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Edit Homepage Image</h4>
                <a href="aboutus.php" class="btn btn-danger">Back</a> 
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                    // Retrieve aboutus data to populate the form
                    if(isset($_GET['id'])) {
                        $aboutusID = validate($_GET['id']);
                        $aboutus = getById('aboutus', $aboutusID);
                        if($aboutus['status'] == 200) {
                            $aboutusData = $aboutus['data'];
                ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php alertMessage(); ?>
                    <input type="hidden" name="id" value="<?= $aboutusData['id'] ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image1</label>
                            <input type="file" name="image" accept="image/*" class="form-control"/>
                            <img src="./uploads/<?= htmlspecialchars($aboutusData['image']) ?>" alt="Current Image" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about">About Bajaj:</label>
                            <textarea name="about" id="about" class="form-control"><?= htmlspecialchars($aboutusData['about']) ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image1">Image2:</label>
                            <input type="file" name="image1" accept="image/*" class="form-control"/>
                            <img src="./uploads/<?= htmlspecialchars($aboutusData['image1']) ?>" alt="Current Image1" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="history">Our History</label>
                            <textarea name="history" id="history" class="form-control"><?= htmlspecialchars($aboutusData['history']) ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image2">Image3:</label>
                            <input type="file" name="image2" accept="image/*" class="form-control"/>
                            <img src="./uploads/<?= htmlspecialchars($aboutusData['image2']) ?>" alt="Current Image2" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="technology">Latest Technology:</label>
                            <textarea name="technology" id="technology" class="form-control"><?= htmlspecialchars($aboutusData['technology']) ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image3">Image4:</label>
                            <input type="file" name="image3" accept="image/*" class="form-control"/>
                            <img src="./uploads/<?= htmlspecialchars($aboutusData['image3']) ?>" alt="Current Image3" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="community">Contributions to Nepal's Bike Community:</label>
                            <textarea name="community" id="community" class="form-control"><?= htmlspecialchars($aboutusData['community']) ?></textarea>
                        </div>    
                        <div class="col-md-6 mb-3">
                            <label for="image4">Image5:</label>
                            <input type="file" name="image4" accept="image/*" class="form-control"/>
                            <img src="./uploads/<?= htmlspecialchars($aboutusData['image4']) ?>" alt="Current Image4" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="commitment">Our Commitment:</label>
                            <textarea name="commitment" id="commitment" class="form-control"><?= htmlspecialchars($aboutusData['commitment']) ?></textarea>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="visitus">Visit Us Today:</label>
                            <textarea name="visitus" id="visitus" class="form-control"><?= htmlspecialchars($aboutusData['visitus']) ?></textarea>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="image5">Image:</label>
                            <input type="file" name="image5" accept="image/*" class="form-control"/>
                            <img src="./uploads/<?= htmlspecialchars($aboutusData['image5']) ?>" alt="Current Image5" class="img-fluid mt-2" style="max-height: 200px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Disable, Checked=Active)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?= $aboutusData['status'] == 1 ? 'checked' : '' ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateAboutus" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <?php 
                        } else {
                            echo '<div class="alert alert-danger">Aboutus Image not found!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Aboutus Image ID not provided!</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
