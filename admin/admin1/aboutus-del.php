<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $aboutusID = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('aboutus', $aboutusID);
    
    if($result) {
        redirect('aboutus.php', 'Aboutus deleted successfully!');
    } else {
        redirect('aboutus.php', 'Failed to delete aboutus. Please try again.');
    }
} else {
    redirect('aboutus.php', 'Aboutus ID not provided.');
}
?>
