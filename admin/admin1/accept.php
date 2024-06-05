<?php
include 'config/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    $query = "UPDATE bookings SET status = 'approved' WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: booking.php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Failed to approve booking.</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>Invalid request method.</div>";
}

?>
