<?php include 'includer/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid px-4">
    <!-- Page Heading -->
    <div class="container p-4">
        <div class="row">
            <div class="card-body">
                <?php alertMessage(); ?>
                <?php 
                $terms = getAll('terms');
                if (mysqli_num_rows($terms) > 0):
                    foreach ($terms as $item):
                        if ($item['title'] === 'Privacy Policy'): 
                ?>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h3 class="text-center"><?= htmlspecialchars($item['title']) ?></h3>
                        <div class="col-md-12">
                            <h5><?= nl2br(htmlspecialchars($item['description'])) ?></h5>
                        </div>
                    </div>
                </div>
                <?php 
                        endif;
                    endforeach;
                else:
                ?>
                <div class="alert alert-warning" role="alert">No Record found</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includer/footer.php'; ?>
