
<?php
include 'includer/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert the message into the database
    $query = "INSERT INTO Messages (name, email, message) 
              VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: thank_you_message .php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>There was an error submitting your message.</div>";
    }
}

include 'includes/footer.php';
?>
