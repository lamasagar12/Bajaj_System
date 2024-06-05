<?php 
if(isset($_SESSION['LoggedIn'])){
    $email = validate($_SESSION['LoggedInUser']['Email']);
    // Use prepared statements to prevent SQL injection
    $query ="SELECT * FROM admins WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) == 0){
        logoutSession();
        redirect('../login.php', 'Access Denied..');
    } else {
        $row = mysqli_fetch_assoc($result);
        if($row['is_ban'] == 1){
            logoutSession();
            redirect('./login.php', 'Your Account has been Banned !!!');
        }
    }
} else {
    redirect('../login.php', 'Login to continue');
}
?>
