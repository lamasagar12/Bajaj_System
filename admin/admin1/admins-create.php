<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Add Admin</h4>
                <a href="admins.php" class="btn btn-primary">Back</a> <!-- Button added back here -->
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <form action="code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="firstname" required class="form-control" pattern="[A-Za-z]+" title="Please enter only alphabetic characters"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for=""> Last Name</label>
                            <input type="text" name="lastname" required class="form-control"  pattern="[A-Za-z]+" title="Please enter only alphabetic characters"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="email" id="email" name="email" required class="form-control" title="Please enter a valid email address"/>
                                </div>
                                <div class="col-md-6 mb-3">
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
                        <div class="col-md-6 mb-3">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" required class="form-control" pattern="\d+" title="Please enter only numeric characters"/>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">Is Ban</label>
                            <input type="checkbox" name="is_ban" style="width:20px;height: 20px;"/>
                        </div>
                        <div class="col-md-12 mb-3">
                        <button type="submit" name="saveAdmin" class="btn btn-primary">Save</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
