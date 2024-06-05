<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Home Page</h4>
                <a href="homepage-create.php" class="btn btn-primary">Add Images</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <?php 
                            $homepage = getAll('homepage');
                            $headings = ['ID', 'Image', 'Name', 'Description', 'Status', 'Action'];
                            foreach($headings as $heading): ?>
                                <tr>
                                    <th><?= $heading ?></th>
                                    <?php if($heading == 'ID'): ?>
                                        <?php if(mysqli_num_rows($homepage) == 0): ?>
                                            <td colspan="6">No Record found</td>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(mysqli_num_rows($homepage) > 0): ?>
                                            <?php foreach($homepage as $item): ?>
                                                <td><?php 
                                                if ($heading == 'Image') {
                                                    echo '<img src="uploads/'.htmlspecialchars($item['image']).'" alt="'.htmlspecialchars($item['name']).'" style="max-width:auto; max-height: 200px;">';
                                                } elseif ($heading == 'Name') {
                                                    echo htmlspecialchars($item['name']);
                                                } elseif ($heading == 'Description') {
                                                    echo htmlspecialchars($item['description']);
                                                } elseif ($heading == 'Status') {
                                                    if ($item['status'] == 1) {
                                                        echo '<span class="badge bg-danger">Disable</span>';
                                                    } else {
                                                        echo '<span class="badge bg-info">Active</span>';
                                                    }
                                                } elseif ($heading == 'Action') {
                                                    echo '<a href="homepage-edit.php?id='.htmlspecialchars($item['id']).'" class="btn btn-success btn-sm">Edit</a>';
                                                    echo '<a href="homepage-del.php?id='.htmlspecialchars($item['id']).'" class="btn btn-danger btn-sm">Delete</a>';
                                                } ?></td>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <td colspan="5">No Record found</td>
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
