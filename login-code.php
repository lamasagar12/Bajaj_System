<?php 
require 'admin/admin1/config/function.php';

if (isset($_POST['loginbtn1'])) {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    
    if ($email != '' && $password != '') {
        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];
                if (password_verify($password, $hashedPassword)) {
                    $_SESSION['UserIn'] = true;
                    $_SESSION['Userlogged'] = [
                        'user_id' => $row['id'],
                        'Firstname' => $row['firstname'],
                        'Lastname' => $row['lastname'],
                        'Email' => $row['email'],
                        'Username' => $row['username'],
                        'Phonenumber' => $row['phonenumber']
                    ];
                    redirect('index.php', 'Logged in Successfully');
                } else {
                    redirect('login.php', 'Invalid Password!');
                }
            } else {
                redirect('login.php', 'Invalid Email!');
            }
        } else {
            redirect('login.php', 'Something went wrong');
        }
    } else {
        redirect('login.php', 'All fields are mandatory');
    }
}
?>
