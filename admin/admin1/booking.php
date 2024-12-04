
<?php
include 'includes/header.php';

// Function to update booking status
function updateBookingStatus($conn, $id, $status) {
    $query = "UPDATE bookings SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Error updating booking status: " . mysqli_error($conn);
    }
}

// Handling form submissions
if(isset($_POST['follow-up'])){
    $id = $_POST['id'];
    updateBookingStatus($conn, $id, 'follow-up');
}

if(isset($_POST['reject'])){
    $id = $_POST['id'];
    updateBookingStatus($conn, $id, 'reject');
}
?>

<div class="container-fluid px-4">
    <!-- Pending Bookings Section -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="width: 100%; min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Booking</h4>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <h1 class="text-center text-white bg-dark col-md-12">PENDING LIST</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Booking Date</th>
                                <th>Bike</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Fetch and display pending bookings
                            $query = "SELECT * FROM bookings WHERE status = 'pending' ORDER BY id ASC";
                            $bookings = mysqli_query($conn, $query);
                            while ($booking = mysqli_fetch_assoc($bookings)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($booking['id']) ?></td>
                                    <td><?= htmlspecialchars($booking['name']) ?></td>
                                    <td><?= htmlspecialchars($booking['email']) ?></td>
                                    <td><?= htmlspecialchars($booking['phone']) ?></td>
                                    <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                                    <td><?= htmlspecialchars($booking['bike_name']) ?></td>
                                    <td><?= htmlspecialchars($booking['status']) ?></td>
                                    <td>
                                        <form action="booking.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                            <button type="submit" name="follow-up" class="btn btn-success btn-sm">Follow-up</button>
                                            <button type="submit" name="reject" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Approved Bookings Section -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <div class="card mt-4 shadow" style="width: 100%; min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Followed-up Bookings</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto;">
                    <h1 class="text-center text-white bg-dark col-md-12">FOLLOWED-UP LIST</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Booking Date</th>
                                <th>Bike</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Fetch and display approved bookings
                            $query = "SELECT * FROM bookings WHERE status = 'follow-up' ORDER BY id ASC";
                            $bookings = mysqli_query($conn, $query);
                            while ($booking = mysqli_fetch_assoc($bookings)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($booking['id']) ?></td>
                                    <td><?= htmlspecialchars($booking['name']) ?></td>
                                    <td><?= htmlspecialchars($booking['email']) ?></td>
                                    <td><?= htmlspecialchars($booking['phone']) ?></td>
                                    <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                                    <td><?= htmlspecialchars($booking['bike_name']) ?></td>
                                    <td><?= htmlspecialchars($booking['status']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Rejected Bookings Section -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <div class="card mt-4 shadow" style="width: 100%; min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Rejected Bookings</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto;">
                    <h1 class="text-center text-white bg-dark col-md-12">REJECTED LIST</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Booking Date</th>
                                <th>Bike</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Fetch and display rejected bookings
                            $query = "SELECT * FROM bookings WHERE status = 'reject' ORDER BY id ASC";
                            $bookings = mysqli_query($conn, $query);
                            while ($booking = mysqli_fetch_assoc($bookings)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($booking['id']) ?></td>
                                    <td><?= htmlspecialchars($booking['name']) ?></td>
                                    <td><?= htmlspecialchars($booking['email']) ?></td>
                                    <td><?= htmlspecialchars($booking['phone']) ?></td>
                                    <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                                    <td><?= htmlspecialchars($booking['bike_name']) ?></td>
                                    <td><?= htmlspecialchars($booking['status']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
