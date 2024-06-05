<?php
include 'includer/header.php'; // Adjust path if necessary

// Function to get product details by ID
function getProductById($id) {
    global $conn; // Assuming you have a $conn variable for your database connection
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Get the product ID from the URL query string
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = getProductById($product_id);

if (!$product) {
    echo "<div class='alert alert-warning' role='alert'>Product not found.</div>";
    include 'includer/footer.php'; // Ensure you close the HTML properly
    exit();
}
?>

    <title><?= htmlspecialchars($product['name']) ?> - Product Details</title>
    <!-- Bootstrap CSS -->
</head>
<body>
    <div class="container p-4">
        <div class="text-center">
            <h1 class="align-items-center"><?= htmlspecialchars($product['name']) ?></h1>
        </div> <br>
        <div class="row">
            <div class="col-md-6">
                <img src="admin/admin1/uploads/<?= htmlspecialchars($product['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($product['name']) ?>">
            </div>
            <div class="col-md-6">
                <h4>Price: Rs.<?= htmlspecialchars($product['price']) ?></h4>
                <h6>Engine Capacity: <?= htmlspecialchars($product['engine_capacity']) ?>CC</h6>
                <h6>Max Power: <?= htmlspecialchars($product['max_power']) ?>bhp</h6>
                <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                <!-- Booking Button at the bottom -->
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
                    <h5 class="modal-title" id="bookingModalLabel">Enquiry Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_booking.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" required class="form-control" pattern="^[A-Za-z]+(?: [A-Za-z]+){0,2}$" title=" Only alphabetic characters"/>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" required class="form-control" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address"/>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
<input type="text" name="phone" required class="form-control" pattern="^(98|97|96)\d{8}$" title="Please Enter correct number"/>

                        </div>
                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Preferred Date</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                            <script>
                                document.getElementById("booking_date").min = new Date().toISOString().split("T")[0];
                            </script>
                        </div>
                        <input type="hidden" name="bike_name" value="<?= htmlspecialchars($product['name']) ?>">
                        <input type="hidden" name="status" value="pending">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                    </form>
            </div>
        </div>
    </div>



<?php include 'includer/footer.php'; ?>

