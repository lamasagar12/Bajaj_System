<?php
require 'admin1/config/function.php';
if(isset($_SESSION['LoggedIn'])){
    logoutSession();
    redirect ('login.php','Logout Successfully');
} 
?>
