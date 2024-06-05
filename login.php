<?php 
include('includer/header.php'); 

// Redirect user if already logged in
if (isset($_SESSION['UserIn'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="py-5">
    <div class="container mt-5" style="max-width: 400px;"> 
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow rounded-4">
                    <?php alertMessage(); ?>
                    <div class="py-4 text-center"> 
                        <h3 class="text-dark mb-3">Login</h3>  
                    </div>
                    <div class="py-3 px-4"> 
                        <form action="login-code.php" method="POST">
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" required/>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required/>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" name="loginbtn1" class="btn btn-primary w-50 mt-3">LogIn</button> 
                            </div>
                            <div class="d-flex justify-content-center">
                                <span>Don't have an account? <a href="signup.php">Signup</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includer/footer.php'); ?>
