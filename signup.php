<?php 
include('includer/header.php'); 
?>
<div class="py-5">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow rounded-5">
            <div class="py-4 text-center">
                <h2 class="text-dark mb-3">Register</h2>
            </div>
            <div class="py-2 px-4">
                <?php alertMessage(); ?> <!-- Display alert message if any -->
                <form action="signup-code.php" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname">Firstname:</label>
                            <input type="text" name="firstname" class="form-control" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Lastname:</label>
                            <input type="text" name="lastname" class="form-control" required/>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="phonenumber">Phone:</label>
                        <input type="text" name="phonenumber" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" required/>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" name="confirm_password" class="form-control" required/>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit" name="registerbtn" class="btn btn-primary w-50 mt-3">Register</button> 
                    </div>
                    <div class="d-flex justify-content-center">
                        <span>Already have an account? <a href="login.php">Login</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includer/footer.php'); ?>
