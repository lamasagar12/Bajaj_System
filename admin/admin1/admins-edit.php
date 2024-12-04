<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Edit Admin</h4>
                <a href="admins.php" class="btn btn-danger">Back</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['id']) && $_GET['id'] != '') {
                        $adminId = $_GET['id'];
                    } else {
                        echo '<h5>No Id Found</h5>';
                        return false;
                    }
                    $adminData = getById('admins', $adminId);
                    if ($adminData) {
                        if ($adminData['status'] == 200) {
                    ?>
                            <input type="hidden" name="adminId" value="<?= $adminData['data']['id']; ?>">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstname" required value="<?= $adminData['data']['firstname']; ?>" class="form-control" pattern="[A-Za-z]+" title="Please enter only alphabetic characters"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" required value="<?= $adminData['data']['lastname']; ?>" class="form-control" pattern="[A-Za-z]+" title="Please enter only alphabetic characters"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" required value="<?= $adminData['data']['email']; ?>" class="form-control" title="Please enter a valid email address"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" pattern="(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" title="at least 8 characters long, one uppercase letter, and one special character (@, $, !, %, *, ?, &)."/>
                                    <input type="checkbox" id="togglePassword" class="toggle-password"> Show Password
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" required value="<?= $adminData['data']['phone']; ?>" class="form-control" pattern="\d+" title="Please enter only numeric characters"/>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="is_ban">Is Ban</label>
                                    <input type="checkbox" name="is_ban" <?= $adminData['data']['is_ban'] ? 'checked' : ''; ?> style="width:20px;height: 20px;" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" name="updateAdmin" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                    <?php
                        } else {
                            echo '<h5>' . $adminData['message'] . '</h5>';
                        }
                    } else {
                        echo 'Something is wrong';
                        return false;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('change', function() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
</script>

<?php include 'includes/footer.php'; ?>
