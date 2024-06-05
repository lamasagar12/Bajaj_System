<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $termsID = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('terms', $termsID);
    
    if($result) {
        redirect('terms.php', 'Terms deleted successfully!');
    } else {
        redirect('terms.php', 'Failed to delete terms. Please try again.');
    }
} else {
    redirect('terms.php', 'Terms ID not provided.');
}
?>
