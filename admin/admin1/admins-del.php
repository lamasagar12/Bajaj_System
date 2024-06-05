<?php
include('config/function.php');

// Check if the 'id' parameter is present and numeric
$paramResultId = checkParamId('id');
if (!is_numeric($paramResultId)) {
    redirect('admins.php', 'Invalid or missing admin ID');
}

$adminId = validate($paramResultId);

// Retrieve admin data by ID
$admin = getById('admins', $adminId);

// Check if admin data retrieval was successful
if (!is_array($admin) || !isset($admin['status'])) {
    redirect('admins.php', 'Something went wrong with retrieving admin data');
}

// Check if admin data status is 200 (success)
if ($admin['status'] !== 200) {
    // Handle error cases
    $errorMessage = isset($admin['message']) ? $admin['message'] : 'Unknown error occurred';
    redirect('admins.php', $errorMessage);
}

// Attempt to delete the admin
$adminDeleteRes = delete('admins', $adminId);

// Check if admin deletion was successful
if ($adminDeleteRes) {
    // Handle successful deletion
    redirect('admins.php', 'Admin deleted successfully');
} else {
    // Handle deletion failure
    redirect('admins.php', 'Failed to delete admin');
}
?>
