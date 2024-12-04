<?php
include('config/function.php');

$paramResultId = checkParamId('id');
if (!is_numeric($paramResultId)) {
    redirect('admins.php', 'Invalid or missing admin ID');
}

$adminId = validate($paramResultId);

$admin = getById('admins', $adminId);

if (!is_array($admin) || !isset($admin['status'])) {
    redirect('admins.php', 'Something went wrong with retrieving admin data');
}

if ($admin['status'] !== 200) {
    $errorMessage = isset($admin['message']) ? $admin['message'] : 'Unknown error occurred';
    redirect('admins.php', $errorMessage);
}

$adminDeleteRes = delete('admins', $adminId);

if ($adminDeleteRes) {
    // Handle successful deletion
    redirect('admins.php', 'Admin deleted successfully');
} else {
    // Handle deletion failure
    redirect('admins.php', 'Failed to delete admin');
}
