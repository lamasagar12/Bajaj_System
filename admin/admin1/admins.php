<?php include 'includes/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow">
            <div class="card-header d-flex justify-content-between align-items-center" style="width: 100%; min-width: 1200px;">
                <h4 class="mb-0">Admins/Staff</h4>
                <a href="admins-create.php" class="btn btn-primary">Add Admin</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status <br>[1 = ban]</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $admins = getAll('admins');
                            if(mysqli_num_rows($admins) > 0) {
                                foreach($admins as $adminItem) {
                            ?>
                            <tr>
                                <td><?= $adminItem['id'] ?></td>

                                <td><?= $adminItem['firstname'] ?></td>
                                <td><?= $adminItem['lastname'] ?></td>
                                <td><?= $adminItem['email'] ?></td>
                                <td><?= $adminItem['phone'] ?></td>
                                <td><?= $adminItem['is_ban'] ?></td>
                                <td><?= $adminItem['created_at'] ?></td>
                                <td>
                                    <a href="admins-edit.php?id=<?= $adminItem['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="admins-del.php?id=<?= $adminItem['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                            ?>
                            <tr>
                                <td colspan="9">No Record found</td>
                            </tr>
                            <?php 
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
