<?php
include 'includes/header.php';

// Check if social ID is provided in the URL
if(isset($_GET['id'])) {
    $social_id = $_GET['id'];
    
    // Fetch social media details from the database
    $sql = "SELECT * FROM Socials WHERE id = $social_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $social = $result->fetch_assoc();
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Social Page</h4>
                <a href="social.php" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="social_id" value="<?= htmlspecialchars($social_id) ?>">
                        <div class="col-md-6 mb-3">
                            <label for="facebook">Facebook:</label>
                            <input type="text" name="facebook" value="<?= htmlspecialchars($social['facebook']) ?>" required class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="instagram">Instagram:</label>
                            <input type="text" name="instagram" value="<?= htmlspecialchars($social['instagram']) ?>" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="twitter">Twitter:</label>
                            <input type="text" name="twitter" value="<?= htmlspecialchars($social['twitter']) ?>" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="youtube">YouTube:</label>
                            <input type="text" name="youtube" value="<?= htmlspecialchars($social['youtube']) ?>" required class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status (Unchecked=Disable, Checked=Active)</label><br>
                            <input type="checkbox" name="status" style="width:15px;height:15px;" <?= $social['status'] == 1 ? 'checked' : '' ?>>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateSocial" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    } else {
        echo '<div class="alert alert-danger">Social media not found!</div>';
    }
} else {
    // If social ID is not provided, redirect back to homepage
    header("Location: social.php");
    exit();
}

include 'includes/footer.php';
?>
