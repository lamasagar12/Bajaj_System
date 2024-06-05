<?php 
require 'admin1/config/function.php';

if (isset($_POST['loginbtn'])) {
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    
    if ($email != '' && $password != '') {
        $query = "SELECT * FROM admins WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $hashedPassword = $row['password'];
                
                if (!password_verify($password, $hashedPassword)) {
                    redirect('login.php','Invalid Password!');
                }
                
                if ($row['is_ban'] == 1) {
                    redirect('login.php','Account Banned!!');
                }   
                $_SESSION['LoggedIn'] = true;
                $_SESSION['LoggedInUser'] = [
                    'user_id' => $row['id'],
                    'Firstname' => $row['firstname'],
                    'Lastname' => $row['lastname'],
                    'Email' => $row['email'],
                    'Phone'=>$row['phone']

                ];
                redirect('admin1/index.php','Logged in Successfully');
            } else {
                redirect('login.php','Invalid Email!');
            }
        } else {
            redirect('login.php','Something went wrong');
        }
    } else {
        redirect('login.php','All fields are mandatory');
    }
}
?>
