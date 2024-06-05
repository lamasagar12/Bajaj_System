<?php
include('config/function.php');

// Check if the 'id' parameter is present and numeric
$paramCategoryId = checkParamId('id');
if (!is_numeric($paramCategoryId)) {
    redirect('categories.php', 'Invalid or missing category ID');
}

// Validate the category ID
$categoryId = validate($paramCategoryId);

// Retrieve category data by ID
$category = getById('categories', $categoryId);

// Check if category data retrieval was successful
if (!is_array($category) || !isset($category['status'])) {
    redirect('categories.php', 'Something went wrong with retrieving category data');
}

// Check if category data status is 200 (success)
if ($category['status'] !== 200) {
    // Handle error cases
    $errorMessage = isset($category['message']) ? $category['message'] : 'Unknown error occurred';
    redirect('categories.php', $errorMessage);
}

// Attempt to delete the category
$categoryDeleteRes = delete('categories', $categoryId);

// Check if category deletion was successful
if ($categoryDeleteRes) {
    // Handle successful deletion
    redirect('categories.php', 'Category deleted successfully');
} else {
    // Handle deletion failure
    redirect('categories.php', 'Failed to delete category');
}
?>
