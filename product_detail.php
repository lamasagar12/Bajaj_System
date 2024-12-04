<?php
include 'includer/header.php';

// Function to fetch product details by ID from the database
function getProductById($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Get the product ID from the URL parameter
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details from the database
$product = getProductById($conn, $product_id);

// If product not found, display a warning message
if (!$product) {
    echo "<div class='alert alert-warning' role='alert'>Product not found.</div>";
    include 'includer/footer.php';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container p-4">
        <div class="text-center">
            <h1 class="align-items-center"><?= htmlspecialchars($product['name']) ?></h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <img src="admin/admin1/uploads/<?= htmlspecialchars($product['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
            <div class="col-md-6">
                <h4>Price: Rs.<?= htmlspecialchars($product['price']) ?></h4>
                <h6>Engine Capacity: <?= htmlspecialchars($product['engine_capacity']) ?>CC</h6>
                <h6>Max Power: <?= htmlspecialchars($product['max_power']) ?>bhp</h6>
                <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                <div class="mt-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
                        Book Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Booking Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_booking.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="fas fa-user"></i> Full Name</label>
                            <input type="text" id="name" name="name" required class="form-control" pattern="^[A-Za-z]+(?: [A-Za-z]+){0,2}$" title="Please enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email Address</label>
                            <input type="email" id="email" name="email" required class="form-control" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"><i class="fas fa-phone"></i> Phone Number</label>
                            <input type="text" name="phone" required class="form-control" pattern="^(98|97|96)\d{8}$" title="Please enter a valid phone number">
                        </div>
                        <div class="mb-3">
                            <label for="booking_date" class="form-label"><i class="far fa-calendar-alt"></i> Preferred Booking Date</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" required min="<?= date('Y-m-d') ?>">
                        </div>
                        <input type="hidden" name="bike_name" value="<?= htmlspecialchars($product['name']) ?>">
                        <input type="hidden" name="status" value="pending">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php include 'includer/footer.php'; ?>

</html>
