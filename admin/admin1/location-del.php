<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $locationID = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('locations', $locationID);
    
    if($result) {
        redirect('location.php', 'Location deleted successfully!');
    } else {
        redirect('location.php', 'Failed to delete location. Please try again.');
    }
} else {
    redirect('location.php', 'Location ID not provided.');
}
?>
