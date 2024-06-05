<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Edit Homepage Image</h4>
                <a href="homepage.php" class="btn btn-danger">Back</a> <!-- Button added back here -->
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                    // Retrieve homepage data to populate the form
                    if(isset($_GET['id'])) {
                        $homepageID = validate($_GET['id']);
                        $homepage = getById('homepage', $homepageID);
                        if($homepage['status'] == 200) {
                            $homepageData = $homepage['data'];
                ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="homepageID" value="<?=$homepageID?>">
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control"/>
                            <?php if(!empty($homepageData['image'])): ?>
                            <img src="uploads/<?=$homepageData['image']?>" alt="Homepage Image" style="max-width: 200px; margin-top: 10px;">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="<?=htmlspecialchars($homepageData['name'])?>" class="form-control" required/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required><?=htmlspecialchars($homepageData['description'])?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Active, Checked=Disable)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?php if($homepageData['status'] == 1) echo 'checked'; ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateImage" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
                <?php 
                        } else {
                            echo '<div class="alert alert-danger">Homepage Image not found!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Homepage Image ID not provided!</div>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
