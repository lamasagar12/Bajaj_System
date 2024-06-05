<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $socialID = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('Socials', $socialID);
    
    if($result) {
        redirect('social.php', 'Social deleted successfully!');
    } else {
        redirect('social.php', 'Failed to delete social. Please try again.');
    }
} else {
    redirect('social.php', 'Social ID not provided.');
}
?>
