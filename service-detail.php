<?php 
include 'includer/header.php'; // Include the header file

// Function to get service details by ID
function getServiceById($id) {
    global $conn; // Assuming you have a $conn variable for your database connection
    $stmt = $conn->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Get the service ID from the URL query string
$serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$service = getServiceById($serviceId);

if (!$service) {
    echo "<div class='alert alert-warning' role='alert'>Service not found.</div>";
    include 'includer/footer.php'; // Include the footer file
    exit();
}
?>

<div class="container p-4">
    <div class="text-center">
        <h1><?= htmlspecialchars($service['name']) ?></h1>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12 text-center">
            <img src="admin/admin1/uploads/<?= htmlspecialchars($service['image']) ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($service['name']) ?>">
        </div>
        <div class="col-md-12">
            <h5><?= nl2br(htmlspecialchars($service['description'])) ?></h5>
        </div>
        <div class="col-md-12 text-center mt-4">
            <a href="contactus.php" class="btn btn-lg btn-primary" role="button" aria-pressed="true">Contact Us for More Information</a>
        </div>
    </div>
</div>

<?php include 'includer/footer.php'; // Include the footer file ?>
