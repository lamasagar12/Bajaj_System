<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Location Page</h4>
                <a href="location-add.php" class="btn btn-primary">Add Location</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <?php 
                            $locations = getAll('locations');
                            $headings = ['ID', 'Address', 'Email', 'Phone', 'Website', 'Open Time', 'Close Time',  'Status', 'Action'];
                            foreach($headings as $heading): ?>
                                <tr>
                                    <th><?= $heading ?></th>
                                    <?php if($heading == 'ID'): ?>
                                        <?php if(mysqli_num_rows($locations) == 0): ?>
                                            <td colspan="9">No Record found</td>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(mysqli_num_rows($locations) > 0): ?>
                                            <?php foreach($locations as $location): ?>
                                                <td><?php 
                                                if ($heading == 'Address') {
                                                    echo htmlspecialchars($location['address']);
                                                } elseif ($heading == 'Email') {
                                                    echo htmlspecialchars($location['email']);
                                                } elseif ($heading == 'Phone') {
                                                    echo htmlspecialchars($location['phone']);
                                                } elseif ($heading == 'Website') {
                                                    echo htmlspecialchars($location['website']);
                                                } elseif ($heading == 'Open Time') {
                                                    echo htmlspecialchars($location['opentime']);
                                                } elseif ($heading == 'Close Time') {
                                                    echo htmlspecialchars($location['closetime']);
                                                } elseif ($heading == 'Status') {
                                                    if ($location['status'] == 1) {
                                                        echo '<span class="badge bg-danger">Hidden</span>';
                                                    } else {
                                                        echo '<span class="badge bg-info">Visible</span>';
                                                    }
                                                } elseif ($heading == 'Action') {
                                                    echo '<a href="location-edit.php?id='.htmlspecialchars($location['id']).'" class="btn btn-success btn-sm">Edit</a>';
                                                    echo '<a href="location-del.php?id='.htmlspecialchars($location['id']).'" class="btn btn-danger btn-sm">Delete</a>';
                                                } ?></td>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <td colspan="8">No Record found</td>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
