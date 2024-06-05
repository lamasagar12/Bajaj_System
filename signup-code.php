<?php 
require 'admin/admin1/config/function.php';

if (isset($_POST['registerbtn'])) {
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $username = validate($_POST['username']);
    $phonenumber = validate($_POST['phonenumber']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    if ($firstname != '' && $lastname != '' && $email != '' && $username != '' && $phonenumber != '' && $password != '' && $confirm_password != '') {
        
        if ($password === $confirm_password) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $query = "SELECT * FROM users WHERE email='$email' OR username='$username' LIMIT 1";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
                if (mysqli_num_rows($result) == 0) {
                    $query = "INSERT INTO users (firstname, lastname, email, username, phonenumber, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$phonenumber', '$hashedPassword')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        redirect('login.php','Registration successful! Please log in.');
                    } else {
                        redirect('signup.php','Registration failed! Please try again.');
                    }
                } else {
                    redirect('signup.php','Email or Username already exists!');
                }
            } else {
                redirect('signup.php','Something went wrong! Please try again.');
            }
        } else {
            redirect('signup.php','Passwords do not match!');
        }
    } else {
        redirect('signup.php','All fields are mandatory');
    }
}
?>
