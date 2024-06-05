<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('homepage', $productId);
    
    if($result) {
        redirect('homepage.php', 'Image deleted successfully!');
    } else {
        redirect('homepage.php', 'Failed to delete image. Please try again.');
    }
} else {
    redirect('homepage.php', 'Image ID not provided.');
}
?>
