<?php
require 'admin/admin1/config/function.php';
if(isset($_SESSION['UserIn'])){
    logoutSession1();
    redirect ('login.php','Logout Successfully');
} 
?>
