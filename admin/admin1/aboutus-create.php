<?php
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 800px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">About us</h4>
                <a href="aboutus.php" class="btn btn-danger">Back to Homepage</a>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php alertMessage(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image1</label>
                            <input type="file" name="image" accept="image/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about">About Bajaj:</label>
                            <textarea name="about" id="about" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image1">Image2:</label>
                            <input type="file" name="image1" accept="image1/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="history">Our History</label>
                            <textarea name="history" id="history" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image2">Image3:</label>
                            <input type="file" name="image2" accept="image2/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="technology">Latest Technology:</label>
                            <textarea name="technology" id="technology" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image3">Image</label>
                            <input type="file" name="image3" accept="image3/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="community">Contributions to Nepal's Bike Community:</label>
                            <textarea name="community" id="community" class="form-control"></textarea>
                        </div>    
                        <div class="col-md-6 mb-3">
                            <label for="image4">Image</label>
                            <input type="file" name="image4" accept="image4/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="commitment">Our Commitment:</label>
                            <textarea name="commitment" id="commitment" class="form-control"></textarea>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="visitus">Visit Us Today:</label>
                            <textarea name="visitus" id="visitus" class="form-control"></textarea>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="image5">Image</label>
                            <input type="file" name="image5" accept="image5/*" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Disable, Checked=Active)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="saveAboutus" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
