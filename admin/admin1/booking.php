<?php include 'includes/header.php'; ?>

<div class="container-fluid px-4">
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
                                        <form action="accept.php" method="POST">
                                            <input type="hidden" name="id" value="<?= $booking['id'] ?>">
                                            <button type="submit" name="approve" class="btn btn-success btn-sm">Approve</button>
                                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php 
                    // Approve or delete booking
                    if(isset($_POST['approve'])){
                        $id = $_POST['id'];
                        $select = "UPDATE bookings SET status = 'approved' WHERE id= '$id'";
                        $result = mysqli_query($conn, $select);
                        header("Location: booking.php");
                        exit();
                    }
                    if(isset($_POST['delete'])){
                        $id = $_POST['id'];
                        $select = "DELETE FROM bookings WHERE id = '$id'";
                        $result = mysqli_query($conn, $select);
                        header("Location: booking.php");
                        exit();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <div class="card mt-4 shadow" style="width: 100%; min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Approved Bookings</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: auto;">
                    <h1 class="text-center text-white bg-dark col-md-12">APPROVED LIST</h1>
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
                            $query = "SELECT * FROM bookings WHERE status = 'approved' ORDER BY id ASC";
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
