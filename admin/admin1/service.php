<?php
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: auto;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Bike Services</h4>
                <a href="service-create.php" class="btn btn-primary">Add New Service</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                              
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Fetch bike services from the database
                            $services = getAll('services');
                            if(mysqli_num_rows($services) > 0):
                                foreach($services as $service): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($service['id']) ?></td>
                                      
                                        <td><?= htmlspecialchars($service['name']) ?></td>
                                        <td>
                                            <img src="uploads/<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['name']) ?>" style="max-width: 45px; max-height: 45px;">
                                        </td>
                                        <td><?= htmlspecialchars($service['description']) ?></td>
                                        <td>
                                            <?php if ($service['status'] == 1): ?>
                                                <span class="badge bg-primary">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="service-edit.php?id=<?= $service['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <a href="service-del.php?id=<?= $service['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="6">No records found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
