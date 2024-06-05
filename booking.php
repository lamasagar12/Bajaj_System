<?php
// Get product ID from the URL query string
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

<form action="process_booking.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Preferred Date</label>
        <input type="date" class="form-control" id="date" name="booking_date" required>
    </div>
    <input type="hidden" name="bike_name" value="<?= htmlspecialchars($product['name']); ?>">
    <input type="hidden" name="status" value="pending">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
