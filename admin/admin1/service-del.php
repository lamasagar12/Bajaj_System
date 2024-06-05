<?php
include 'config/function.php';

if(isset($_GET['id'])) {
    $serviceID = $_GET['id'];
    
    // Delete the product from the database
    $result = delete('services', $serviceID);
    
    if($result) {
        redirect('service.php', 'Servie deleted successfully!');
    } else {
        redirect('service.php', 'Failed to delete service. Please try again.');
    }
} else {
    redirect('service.php', 'Servie ID not provided.');
}
?>
