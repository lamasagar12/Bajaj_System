<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('products', $productId);
    
    if($result) {
        redirect('product.php', 'Product deleted successfully!');
    } else {
        redirect('product.php', 'Failed to delete product. Please try again.');
    }
} else {
    redirect('product.php', 'Product ID not provided.');
}
?>
z