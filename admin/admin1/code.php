<?php 
include('config/function.php');
//add admin
if (isset($_POST['saveAdmin'])) {


    // Validate form inputs
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = isset($_POST['phone']) ? validate($_POST['phone']) : '';
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;

    // Check required fields
    if ($firstname != '' && $lastname != '' && $email != '' && $password != '' && $phone !== '') {
        // Check if email is already used
        $emailCheckQuery = "SELECT * FROM admins WHERE email='$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        if ($emailCheckResult && mysqli_num_rows($emailCheckResult) > 0) {
            redirect('admins-create.php', 'Email Already Used.');
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare data for insertion
        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            "is_ban" => $is_ban,
        ];

        // Insert data into database
        $result = insert('admins', $data);

        // Handle result of insertion
        if ($result) {
            redirect('admins.php', 'Admin Created Successfully!');
        } else {
            redirect('admins-create.php', 'Something went Wrong');
        }
    } else {
        redirect('admins-create.php', 'Please fill the required fields.');
    }
}
//update admin
if(isset($_POST['updateAdmin'])){
    $adminId = validate($_POST['adminId']);
    $adminData = getById('admins', $adminId);
    
    if($adminData['status'] != 200){
        redirect('admins-edit.php?id='.$adminId, 'Please fill the fields.'); 
    }
    
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = isset($_POST['phone']) ? validate($_POST['phone']) : '';
    $is_ban = isset($_POST['is_ban']) ? 1 : 0;

    $emailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id != '$adminId'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);
    
    if ($emailCheckResult && mysqli_num_rows($emailCheckResult) > 0){
        redirect('admins-edit.php?id='.$adminId, 'Email Already Used');
    }
    
    if($password != ''){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $hashedPassword = $adminData['data']['password'];
    }
    
    if($firstname != '' && $lastname != '' && $email != '' && $phone !== '') {
        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            "is_ban" => $is_ban,
        ];
        
        $result = update('admins', $adminId, $data);
        
        if($result){
            redirect('admins.php?id='.$adminId, 'Admin Updated Successfully!');
        } else {
            redirect('admins-edit.php?id='.$adminId, 'Something went Wrong');
        }
    } else {
        redirect('admins-create.php', 'Please fill the required.');
    }
}

$uploadsDirectory = 'uploads';

// Check if the directory exists
if (!is_dir($uploadsDirectory)) {
    // Create the directory if it doesn't exist
    mkdir($uploadsDirectory, 0777, true); // The third parameter ensures recursive creation of directories if needed
}

if(isset($_POST['saveCategory'])){
    // Check if image file was uploaded without errors
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $image = $_FILES['image']['name']; // Get the file name
        $temp_name = $_FILES['image']['tmp_name']; // Get the temporary file name
        $image_path = "uploads/" . $image; // Define the path where the image will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image_path);
    } else {
        $image = ""; 
    }

    $name = validate($_POST['name']); // Validate the category name
    $description = validate($_POST['description']); // Validate the description
    $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

    // Prepare data array
    $data = [
        'image' => $image,
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];
    
    // Insert data into the database
    $result = insert('categories', $data);
    
    if($result){
        redirect('categories.php', 'Category Added Successfully!');
    } else {
        redirect('categories-create.php', 'Something went Wrong');
    }
}
if (isset($_POST['updateCategory'])) {
    $categoryID = $_POST['categoryID']; // Get the category ID

    $categoryData = getById('categories', $categoryID);
    if ($categoryData['status'] == 200) {
        $image = $categoryData['data']['image']; // Retain the existing image

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $image = $_FILES['image']['name']; // Get the file name
            $temp_name = $_FILES['image']['tmp_name']; // Get the temporary file name
            $image_path = "uploads/" . $image; // Define the path where the image will be stored

            move_uploaded_file($temp_name, $image_path);
        }

        $name = validate($_POST['name']); 
        $description = validate($_POST['description']); 
        $status = isset($_POST['status']) ? 1 : 0; 

        $data = [
            'image' => $image,
            'name' => $name,
            'description' => $description,
            'status' => $status
        ];

        $result = update('categories', $categoryID, $data);

        if ($result) {
            redirect('categories.php', 'Category Updated Successfully!');
        } else {
            redirect('categories-edit.php?id=' . $categoryID, 'Failed to update category. Please try again.');
        }
    } else {
        redirect('categories-edit.php?id=' . $categoryID, 'Category not found.');
    }
}


if(isset($_POST['saveProduct'])) {
    // Check if image file was uploaded without errors
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES['image']['name']; // Get the file name
        $temp_name = $_FILES['image']['tmp_name']; // Get the temporary file name
        $image_path = "uploads/" . $image; // Define the path where the image will be stored

        move_uploaded_file($temp_name, $image_path);
    } else {
        $image = ""; 
    }
    $name = validate($_POST['name']); // Validate the homepage name
    $price = validate($_POST['price']); // Validate the price
    $category_id = validate($_POST['category_id']); // Validate the category ID
    $engine_capacity = validate($_POST['engine_capacity']); // Validate the engine capacity
    $max_power = validate($_POST['max_power']); // Validate the max power
    $description = validate($_POST['description']); // Validate the description
    $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

    $data = [
        'image' => $image,
        'name' => $name,
        'price' => $price,
        'category_id' => $category_id, // Corrected key name
        'engine_capacity' => $engine_capacity,
        'max_power' => $max_power,
        'description' => $description,
        'status' => $status
    ];

    $result = insert('products', $data);

    if($result) {
        redirect('product.php', 'Product Added Successfully!');
    } else {
        redirect('product-create.php', 'Something went wrong');
    }
}

// product-update
if(isset($_POST['updateProduct'])) {
    $productId = $_POST['productId']; 
    $homepageData = getById('products', $productId);
    if($homepageData['status'] == 200) {
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $image = $_FILES['image']['name']; 
            $temp_name = $_FILES['image']['tmp_name']; 
            $image_path = "uploads/" . $image; 
            move_uploaded_file($temp_name, $image_path);
            $data['image'] = $image;
        } else {
            $image = $homepageData['data']['image']; // Retain the existing image if no new image is uploaded
        }

        $name = validate($_POST['name']);
        $price = validate($_POST['price']); 
        $category_id = validate($_POST['category_id']); 
        $engine_capacity = validate($_POST['engine_capacity']);
        $max_power = validate($_POST['max_power']); 
        $description = validate($_POST['description']); 
        $status = isset($_POST['status']) ? 1 : 0;
        $data = [
            'image' => $image,
            'name' => $name,
            'price' => $price,
            'category_id' => $category_id,
            'engine_capacity' => $engine_capacity,
            'max_power' => $max_power,
            'description' => $description,
            'status' => $status
        ];

        $result = update('products', $productId, $data);

        if($result) {
            redirect('product.php', 'Product Updated Successfully!');
        } else {
            redirect('product-edit.php?id='.$productId, 'Failed to update product. Please try again.');
        }
    } else {
        redirect('product-edit.php?id='.$productId, 'Product not found.');
    }
}





// save homepage
if(isset($_POST['saveImage'])) {
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES['image']['name']; 
        $temp_name = $_FILES['image']['tmp_name']; 
        $image_path = "uploads/" . $image; 
        move_uploaded_file($temp_name, $image_path);
    } else {
        $image = ""; 
    }
    $name = validate($_POST['name']); 
    $description = validate($_POST['description']); 
    $status = isset($_POST['status']) ? 1 : 0;

    $data = [
        'image' => $image,
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];
    $result = insert('homepage', $data);

    if($result) {
        redirect('homepage.php', 'Product Added Successfully!');
    } else {
        redirect('homepage-create.php', 'Something went wrong');
    }
}


// Update image details
if (isset($_POST['updateImage'])) {
    $homepageID = validate($_POST['homepageID']); 
    
    $homepageData = getById('homepage', $homepageID);
    if ($homepageData['status'] == 200) {
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $image = $_FILES['image']['name']; // Get the file name
            $temp_name = $_FILES['image']['tmp_name']; // Get the temporary file name
            $image_path = "uploads/" . $image; // Define the path where the image will be stored
            move_uploaded_file($temp_name, $image_path);
            $data['image'] = $image;

            // Delete old image if a new image is uploaded
            if (file_exists("uploads/" . $homepageData['data']['image'])) {
                unlink("uploads/" . $homepageData['data']['image']);
            }
        } else {
            $image = $homepageData['data']['image']; // Retain the existing image if no new image is uploaded
        }

        $name = validate($_POST['name']); // Validate the homepage name
        $description = validate($_POST['description']); // Validate the description
        $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

        // Prepare data array
        $data = [
            'image' => $image,
            'name' => $name,
            'description' => $description,
            'status' => $status
        ];

        // Update data into the database
        $result = update('homepage', $homepageID, $data);

        if ($result) {
            redirect('homepage.php', 'Homepage Image Updated Successfully!');
        } else {
            redirect('homepage-edit.php?id=' . $homepageID, 'Failed to update homepage. Please try again.');
        }
    } else {
        redirect('homepage-edit.php?id=' . $homepageID, 'Homepage Image not found.');
    }
}

// Save location
if(isset($_POST['saveLocation'])) {
    // Validate form inputs
    $address = validate($_POST['address']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $website = validate($_POST['website']);
    $opentime = validate($_POST['opentime']);
    $closetime = validate($_POST['closetime']);
    $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

    // Prepare data array
    $data = [
        'address' => $address,
        'email' => $email,
        'phone' => $phone,
        'website' => $website,
        'opentime' => $opentime,
        'closetime' => $closetime,
        'status' => $status
    ];

    // Insert data into the database
    $result = insert('locations', $data); // Assuming 'locations' is the table name

    // Redirect based on result
    if($result) {
        redirect('location.php', 'Location Added Successfully!');
    } else {
        redirect('location-add.php', 'Something went wrong');
    }
}


// Update Location 
if (isset($_POST['updateLocation'])) {
    $locationID = $_POST['locationID']; // Get the category ID

    // Retrieve existing category data
    $locationData = getById('locations', $locationID);
    if ($locationData['status'] == 200) {
        $address = validate($_POST['address']);
        $email = validate($_POST['email']);
        $phone = validate($_POST['phone']);
        $website = validate($_POST['website']);
        $opentime = validate($_POST['opentime']);
        $closetime = validate($_POST['closetime']);
        $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value
        // Prepare data array
        $data = [
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'website' => $website,
            'opentime' => $opentime,
            'closetime' => $closetime,
            'status' => $status
        ];

        // Update data in the database
        $result = update('locations', $locationID, $data);

        if ($result) {
            redirect('location.php', 'Location Updated Successfully!');
        } else {
            redirect('location-edit.php?id=' . $locationID, 'Failed to update location . Please try again.');
        }
    } else {
        redirect('location-edit.php?id=' . $locationID, 'Location not found.');
    }
}



//save social

if(isset($_POST['saveSocial'])) {
    // Validate form inputs
    $facebook = validate($_POST['facebook']);
    $instagram = validate($_POST['instagram']);
    $twitter = validate($_POST['twitter']);
    $youtube = validate($_POST['youtube']);


    $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

    // Prepare data array
    $data = [
        'facebook' => $facebook,
        'instagram' => $instagram,
        'twitter' => $twitter,
        'youtube' => $youtube,
        'status' => $status
    ];

    // Insert data into the database
    $result = insert('Socials', $data); // Assuming 'locations' is the table name

    // Redirect based on result
    if($result) {
        redirect('social.php', 'Social Added Successfully!');
    } else {
        redirect('social-create.php', 'Something went wrong');
    }
}

// Update social media
if(isset($_POST['updateSocial'])) {
    $social_id = $_POST['social_id']; // Get the social media ID
    // Validate form inputs
    $social = getById('Socials', $social_id);
    if ($social['status'] == 200) {
        $facebook = validate($_POST['facebook']);
        $instagram = validate($_POST['instagram']);
        $twitter = validate($_POST['twitter']);
        $youtube = validate($_POST['youtube']);
        $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

        // Prepare data array
        $data = [
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'youtube' => $youtube,
            'status' => $status
        ];

        // Update data in the database
        $result = update('Socials',$social_id, $data); // Assuming 'Socials' is the table name

        // Redirect based on result
        if($result) {
            redirect('social.php', 'Social Updated Successfully!');
        } else {
            redirect('social-edit.php?id=' . $social_id, 'Something went wrong');
        }
    }
    else{
        redirect('social-edit.php?id=' . $social_id, 'Social Not Found');
    }
}

if(isset($_POST['saveService'])) {
    // Check if image file was uploaded without errors
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES['image']['name']; // Get the file name
        $temp_name = $_FILES['image']['tmp_name']; // Get the temporary file name
        $image_path = "uploads/" . $image; // Define the path where the image will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image_path);
    } else {
        $image = ""; 
    }
    $name = validate($_POST['name']); // Validate the product name
    $description = validate($_POST['description']); // Validate the description
    $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

    // Prepare data array
    $data = [
        'image' => $image,
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];

    // Insert data into the database
    $result = insert('services', $data);

    if($result) {
        redirect('service.php', 'Service Added Successfully!');
    } else {
        redirect('service-create.php', 'Something went wrong');
    }
}

// Update Service
if (isset($_POST['updateService'])) {
    $service_id = $_POST['service_id']; 

    $service = getById('services', $service_id);
    if ($service['status'] == 200) {
        $image = $service['data']['image'];

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $image = $_FILES['image']['name']; 
            $temp_name = $_FILES['image']['tmp_name'];
            $image_path = "uploads/" . $image; 

            move_uploaded_file($temp_name, $image_path);
        }

        $name = validate($_POST['name']);
        $description = validate($_POST['description']); 
        $status = isset($_POST['status']) ? 1 : 0; 

        // Prepare data array
        $data = [
            'image' => $image,
            'name' => $name,
            'description' => $description,
            'status' => $status
        ];

        // Update data in the database
        $result = update('services', $service_id, $data);

        if ($result) {
            redirect('service.php', 'Service Updated Successfully!');
        } else {
            redirect('service-edit.php?id=' . $service_id, 'Failed to update service. Please try again.');
        }
    } else {
        redirect('service-edit.php?id=' . $service_id, 'Service not found.');
    }
}

if(isset($_POST['saveAboutus'])) {
    $aboutBaja = validate($_POST['about']); 
    $history = validate($_POST['history']); 
    $technology = validate($_POST['technology']);
    $community = validate($_POST['community']); 
    $commitment = validate($_POST['commitment']); 
    $visitus = validate($_POST['visitus']); 

    // Check if image file was uploaded without errors
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES['image']['name']; // Get the file name
        $temp_name = $_FILES['image']['tmp_name']; // Get the temporary file name
        $image_path = "uploads/" . $image; // Define the path where the image will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image_path);
    } else {
        $image = ""; 
    }

    if(isset($_FILES["image1"]) && $_FILES["image1"]["error"] == 0) {
        $image1 = $_FILES['image1']['name']; // Get the file name
        $temp_name = $_FILES['image1']['tmp_name']; // Get the temporary file name
        $image1_path = "uploads/" . $image1; // Define the path where the image1 will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image1_path);
    } else {
        $image1 = ""; 
    }

    if(isset($_FILES["image2"]) && $_FILES["image2"]["error"] == 0) {
        $image2 = $_FILES['image2']['name']; // Get the file name
        $temp_name = $_FILES['image2']['tmp_name']; // Get the temporary file name
        $image2_path = "uploads/" . $image2; // Define the path where the image2 will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image2_path);
    } else {
        $image2 = ""; 
    }

    if(isset($_FILES["image3"]) && $_FILES["image3"]["error"] == 0) {
        $image3 = $_FILES['image3']['name']; // Get the file name
        $temp_name = $_FILES['image3']['tmp_name']; // Get the temporary file name
        $image3_path = "uploads/" . $image3; // Define the path where the image3 will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image3_path);
    } else {
        $image3 = ""; 
    }

    if(isset($_FILES["image4"]) && $_FILES["image4"]["error"] == 0) {
        $image4 = $_FILES['image4']['name']; // Get the file name
        $temp_name = $_FILES['image4']['tmp_name']; // Get the temporary file name
        $image4_path = "uploads/" . $image4; // Define the path where the image4 will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image4_path);
    } else {
        $image4 = ""; 
    }

    if(isset($_FILES["image5"]) && $_FILES["image5"]["error"] == 0) {
        $image5 = $_FILES['image5']['name']; // Get the file name
        $temp_name = $_FILES['image5']['tmp_name']; // Get the temporary file name
        $image5_path = "uploads/" . $image5; // Define the path where the image5 will be stored

        // Move the uploaded file to the specified location
        move_uploaded_file($temp_name, $image5_path);
    } else {
        $image5 = ""; 
    }

    $status = isset($_POST['status']) ? 1 : 0; // Set status based on checkbox value

    // Prepare data array
    $data = [
        'image' => $image,
        'about' => $aboutBaja,
        'image1' => $image1,
        'history' => $history,
        'image2' => $image2,
        'technology' => $technology,
        'image3' => $image3,
        'community' => $community,
        'image4' => $image4,
        'commitment' => $commitment,
        'visitus' => $visitus,
        'image5' => $image5,
        'status' => $status
    ];

    $result = insert('aboutus', $data);

    if($result) {
        redirect('aboutus.php', 'About Us Added Successfully!');
    } else {
        redirect('aboutus-create.php', 'Something went wrong');
    }
}
//update aboutus
if (isset($_POST['updateAboutus'])) {
    $aboutusID = $_POST['aboutusID']; 

    $service = getById('aboutus', $aboutusID);
    if ($service['status'] == 200) {
        // Process image uploads
        $imageFields = ['image', 'image1', 'image2', 'image3', 'image4', 'image5'];
        $images = [];

        foreach ($imageFields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
                $imageName = $_FILES[$field]['name']; 
                $tempName = $_FILES[$field]['tmp_name'];
                $imagePath = "uploads/" . $imageName;

                if (move_uploaded_file($tempName, $imagePath)) {
                    $images[$field] = $imageName;
                } else {
                    $images[$field] = $service['data'][$field];
                }
            } else {
                $images[$field] = $service['data'][$field];
            }
        }

        // Validate text inputs
        $aboutBaja = validate($_POST['about']); 
        $history = validate($_POST['history']); 
        $technology = validate($_POST['technology']);
        $community = validate($_POST['community']); 
        $commitment = validate($_POST['commitment']); 
        $visitus = validate($_POST['visitus']); 
        $status = isset($_POST['status']) ? 1 : 0; 

        // Prepare data array
        $data = [
            'image' => $images['image'],
            'about' => $aboutBaja,
            'image1' => $images['image1'],
            'history' => $history,
            'image2' => $images['image2'],
            'technology' => $technology,
            'image3' => $images['image3'],
            'community' => $community,
            'image4' => $images['image4'],
            'commitment' => $commitment,
            'visitus' => $visitus,
            'image5' => $images['image5'],
            'status' => $status
        ];

        // Update data in the database
        $result = update('aboutus', $aboutusID, $data);

        if ($result) {
            redirect('aboutus.php', 'About Us updated successfully!');
        } else {
            redirect('aboutus-edit.php?id=' . $aboutusID, 'Failed to update About Us. Please try again.');
        }
    } else {
        redirect('aboutus-edit.php?id=' . $aboutusID, 'About Us not found.');
    }
}
//saveTitle
if (isset($_POST['saveTitle'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO terms (title, description) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $title, $description);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Term added successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to add term!";
        $_SESSION['msg_type'] = "danger";
    }

    header("Location: terms.php");
    exit;
} elseif (isset($_POST['updateTitle'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE terms SET title = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $title, $description, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Term updated successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to update term!";
        $_SESSION['msg_type'] = "danger";
    }

    header("Location: terms.php?id=$id");
    exit;
} else {
    echo "No form submission detected!";
    exit;
}
?>




