<?php include 'includer/header.php'; ?>
<style>
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: contain; 
            background-color: transparent;
        }
        .card {
            height: 350px; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4">
        <div class="row justify-content-center align-items-center mb-4">
            <div class="col-12 text-center">
                <h1>Category</h1>
            </div>
            <div class="col-12 text-center">
                <?php alertMessage(); ?>
            </div>
        </div>
<div class="row">
    <?php 
    $categories = getAll('categories');
    if (mysqli_num_rows($categories) > 0) {
        foreach ($categories as $item):
            if ($item['status'] == 0): 
    ?>
                <div class="col-md-4 mb-4">
                    <div class="card text-center border-0">
                        <img src="admin/admin1/uploads/<?= htmlspecialchars($item['image']) ?>" class="card-img-top mx-auto" alt="<?= htmlspecialchars($item['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                            <a href="category_detail.php?id=<?= htmlspecialchars($item['id']) ?>" class="btn btn-success btn-sm">Explore</a>
                        </div>
                    </div>
                </div>
    <?php 
            endif;
        endforeach;
    } else {
        echo "<p>No categories found.</p>";
    }
    ?>
</div>
    <section>
        <hr class="sidebar-divider">
        <?php include 'product.php'; ?>
    </section>
    <hr class="sidebar-divider">
    <section id="book">
    </section>
</div>
<?php include 'includer/footer.php'; ?>
