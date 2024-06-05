<?php
include 'includer/header.php'; // Adjust path if necessary

// Function to get category details by ID
function getProductById($id) {
    global $conn; // Assuming you have a $conn variable for your database connection
    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Get the category ID from the URL query string
$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$category = getProductById($category_id);

if (!$category) {
    echo "<div class='alert alert-warning' role='alert'>Product not found.</div>";
    include 'includer/footer.php'; // Ensure you close the HTML properly
    exit();
}

// Function to get products by category ID
function getProductsByCategoryId($categoryId) {
    global $conn; // Assuming you have a $conn variable for your database connection
    $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    return $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category['name']) ?> - Product Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container p-4">
        <div class="text-center">
            <h1 class="align-items-center"><?= htmlspecialchars($category['name']) ?></h1>
        </div>
        <div class="row mt-4" >
            <div class="col-md-12 text-center" style="align-items:center;">
                <img src="admin/admin1/uploads/<?= htmlspecialchars($category['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($category['name']) ?>">
            </div>
            <div class="col-md-12 mt-4">
                <h3><?= nl2br(htmlspecialchars($category['description'])) ?></h3>
            </div>
            <div class="col-md-12 text-center mt-4">
                <a href="#product1"id=<?= $category_id ?> class="btn btn-primary">Explore</a>
            </div>
        </div>
    </div>

    <section id="product1">
    <style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }
        .card-title {
            margin-top: auto;
        }
    </style>
    <div class="container p-4">
        <h1 style="text-align:center;">Bike Collection</h1>
        <div class="row">
            <?php
            $products = getProductsByCategoryId($category_id);
            if (mysqli_num_rows($products) > 0):
                foreach ($products as $item):
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top" src="admin/admin1/uploads/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                    <div class="card-body mt-auto">
                        <h4 class="card-title mt-auto"><?= htmlspecialchars($item['name']) ?></h4>
                    </div>
                    <div class="card-footer">
                        <a href="product_detail.php?id=<?= htmlspecialchars($item['id']) ?>" class="btn btn-success btn-sm">Book now</a>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
            else:
            ?>
            <div class="col-lg-12">
                <div class="alert alert-warning" role="alert">
                    No products found.
                </div>
            </div>
            <?php endif; ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
    </section>
    <?php include 'includer/footer.php'; // Ensure you close the HTML properly ?>
</body>
</html>
