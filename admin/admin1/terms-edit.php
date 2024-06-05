<?php
include 'includes/header.php';



// Fetch the current data for the term
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM terms WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $term = $result->fetch_assoc();
} else {
    echo "No term ID provided!";
    exit;
}
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Terms Page</h4>
                <a href="terms.php" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php alertMessage(); ?>
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $term['id']; ?>" />
                        <div class="col-md-6 mb-3">
                            <label for="title">Title:</label>
                            <input type="text" name="title" required class="form-control" value="<?php echo htmlspecialchars($term['title']); ?>" />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" required class="form-control" rows="3"><?php echo htmlspecialchars($term['description']); ?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <br>
                            <button type="submit" name="updateTitle" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
