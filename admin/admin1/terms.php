<?php include 'includes/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card mt-4 shadow" style="min-width: 1200px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Terms Page</h4>
                <a href="terms-create.php" class="btn btn-primary">Add Terms</a>
            </div>
            <div class="card-body">
                <?php alertMessage(); ?>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <?php 
                            $terms = getAll('terms');
                            $headings = ['ID', 'Title', 'Description', 'Action'];
                            foreach($headings as $heading): ?>
                                <tr>
                                    <th><?= $heading ?></th>
                                    <?php if($heading == 'ID'): ?>
                                        <?php if(mysqli_num_rows($terms) == 0): ?>
                                            <td colspan="6">No Record found</td>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(mysqli_num_rows($terms) > 0): ?>
                                            <?php foreach($terms as $item): ?>
                                                <td><?php 
                                                if ($heading == 'Title') {
                                                    echo htmlspecialchars($item['title']);
                                                } elseif ($heading == 'Description') {
                                                    echo htmlspecialchars($item['description']);
                                               
                                                } elseif ($heading == 'Action') {
                                                    echo '<a href="terms-edit.php?id='.htmlspecialchars($item['id']).'" class="btn btn-success btn-sm">Edit</a>';
                                                    echo '<a href="terms-del.php?id='.htmlspecialchars($item['id']).'" class="btn btn-danger btn-sm">Delete</a>';
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
