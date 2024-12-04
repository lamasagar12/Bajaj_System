<?php
include 'includer/header.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $bike_name = mysqli_real_escape_string($conn, $_POST['bike_name']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Check if email or phone already exist
    $check_query = "SELECT * FROM bookings WHERE email = '$email' OR phone = '$phone'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<div class='alert alert-danger' role='alert'>Email or phone already exists. <a href='javascript:history.back()'>Go Back</a></div>";
        include 'includer/footer.php'; // Ensure you include the footer before exiting
        exit(); // Stop further execution
    }

    // Insert the booking into the database
    $query = "INSERT INTO bookings (name, email, phone, booking_date, bike_name, status) 
              VALUES ('$name', '$email', '$phone', '$booking_date', '$bike_name', '$status')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: thank_you.php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>There was an error submitting your booking. <a href='javascript:history.back()'>Go Back</a></div>";
    }
}

include 'includer/footer.php';
?>
