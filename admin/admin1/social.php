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
                            $social = getAll('socials');
                            $headings = ['ID', 'Facebook', 'Instagram', 'Twitter', 'YouTube', 'Status', 'Action'];
                            foreach($headings as $heading): ?>
                                <tr>
                                    <th><?= $heading ?></th>
                                    <?php if($heading == 'ID'): ?>
                                        <?php if(mysqli_num_rows($social) == 0): ?>
                                            <td colspan="6">No Record found</td>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(mysqli_num_rows($social) > 0): ?>
                                            <?php foreach($social as $item): ?>
                                                <td><?php 
                                                if ($heading == 'Facebook') {
                                                    echo htmlspecialchars($item['facebook']);
                                                } elseif ($heading == 'Instagram') {
                                                    echo htmlspecialchars($item['instagram']);
                                                } elseif ($heading == 'Twitter') {
                                                    echo htmlspecialchars($item['twitter']);
                                                } elseif ($heading == 'YouTube') {
                                                    echo htmlspecialchars($item['youtube']);
                                                } elseif ($heading == 'Status') {
                                                    if ($item['status'] == 1) {
                                                        echo '<span class="badge bg-danger">Disable</span>';
                                                    } else {
                                                        echo '<span class="badge bg-info">Active</span>';
                                                    }
                                                } elseif ($heading == 'Action') {
                                                    echo '<a href="social-edit.php?id='.htmlspecialchars($item['id']).'" class="btn btn-success btn-sm">Edit</a>';
                                                    echo '<a href="social-del.php?id='.htmlspecialchars($item['id']).'" class="btn btn-danger btn-sm">Delete</a>';
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
