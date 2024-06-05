<?php 
include('includes/header.php'); 
if (isset($_SESSION['LoggedIn'])) {
    ?>
    <script>window.location.href ='login.php';</script>
    <?php
}
?>
<div class="py-5 ">
  <div class="container mt-5" style="max-width: 400px;"> 
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="card shadow rounded-4">
        <?php alertMessage(); ?>
          <div class="py-4 text-center"> 
            <h3 class="text-dark mb-3">LogIn to the System</h3>  
          </div>
          <div class="py-3 px-4"> 
            <form action="login-code.php" method="POST">
              <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required class="form-control" title="Please enter a valid email address"/>
              </div>
              <div class="mb-3">
              <style>
        .toggle-password {
            margin-top: 10px;
        }
    </style>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required class="form-control" pattern="(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" title="at least 8 characters long,  one uppercase letter, and one special character (@, $, !, %, *, ?, &)."/>
            <input type="checkbox" id="togglePassword" class="toggle-password"> Show Password
    <script>
        document.getElementById('togglePassword').addEventListener('change', function() {
            const passwordInput = document.getElementById('password');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
              </div>
              <div class="mb-3">
                <button type="submit" name="loginbtn" class="btn btn-primary w-100 mt-3">LogIn</button> 
                            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
