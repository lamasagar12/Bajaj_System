<?php 
 session_start();
require'dbcon.php';
// Input field validation
function validate($inputData){
    global $conn;
    if (is_array($inputData)) {
        $validatedData = array();
        foreach ($inputData as $key => $value) {
            $validatedData[$key] = mysqli_real_escape_string($conn, trim($value));
        }
        return $validatedData;
    } else {
        return mysqli_real_escape_string($conn, trim($inputData));
    }
}


//redirect functiom
function redirect($url, $status){
    $_SESSION['status'] = $status;
    header('Location: ' . $url);
    exit(0);
}

// Display the message
function alertMessage(){
    if(isset($_SESSION['status'])){
        echo '<div class="alert alert-warning alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
        <span>' . $_SESSION['status'] . '</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
        unset($_SESSION['status']);
    }
}


 // Insert record
 function insert($tableName, $data){
    global $conn;

    $table = validate($tableName);
    
    $columns= array_keys($data);
    $values=array_values($data);

    $finalColumn =implode(',',$columns);
    $finalValues = "'". implode("','",$values)."'"; 

    $query ="INSERT INTO $table ($finalColumn) VALUES($finalValues)";
    $result = mysqli_query($conn,$query);
    return $result;


 }
 // Update Record
 function update($tableName ,$id ,  $data){
    global $conn;
    $table = validate($tableName);
    $id=validate($id);
    $updateDataString="";
    foreach($data as  $column => $value){
        $updateDataString .= $column.'='."'$value',";
    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    return $result;
 }

//get All
 function getALL($tableName, $status = NULL){

    global $conn;
    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status'){

        $query ="SELECT * FROM $table WHERE status='0'";
    }
    else{
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($conn,$query);
 }

function getById($tableName,$id){
    global $conn;
    $table = validate($tableName);
    $id= validate($id);
    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn,$query);
    if($result){
if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    $response = [
        'status'=>200,
        'data'=>$row,
        'message'=>'Record Found'
    ];
    return $response;
}else{
    $response = [
        'status'=>404,
        'message'=>'NO Data Found'
    ];
    return $response;
}
    }else{
        $response = [
            'status'=>500,
            'message'=>'Something Went Wrong'
        ];
        return $response;
    }

}
//Delete data 
function delete($tableName,$id ){
    global $conn;
    $table = validate($tableName);
    $id = validate($id);
    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;

}
// Check param
function checkParamId($type){
    if(isset($_GET[$type])){
        if($_GET[$type] != ''){
            return $_GET[$type];
        } else {
            return '<h5>No Id found</h5>';
        }
    } else {
        return '<h5>No Id Given</h5>';
    }
}
// logout_Function.php

function logoutSession() {
    // Unset the loggedIn and loggedInUser session variables
    unset($_SESSION['LoggedIn']);
    unset($_SESSION['LoggedInUser']);
    
}

function logoutSession1() {
    // Unset the loggedIn and loggedInUser session variables
    unset($_SESSION['UserIn']);
    unset($_SESSION['Userlogged']);
    
}



//CountFunction
function getCount($tableName)
 {
    global $conn;
    $table = validate($tableName);
    $query = "SELECT *FROM $table";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        $totalCount = mysqli_num_rows($query_run);
        return $totalCount;
    }else{
        return 'Something Went Wrong';
    }
}

function getAll1($table) {
    global $conn;
    if ($table == 'products') {
        $sql = "SELECT products.*, categories.name AS category_name 
                FROM products 
                JOIN categories ON products.category_id = categories.id";
    } else {
        $sql = "SELECT * FROM $table";
    }
    $result = $conn->query($sql);
    return $result;
}

function getAllApproved($table) {
    global $conn;
    $query = "SELECT * FROM $table WHERE status = 'approved'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function getCount1($table, $condition = '1') {
    global $conn; // Assuming you have a $conn variable for your database connection
    $sql = "SELECT COUNT(*) as count FROM $table WHERE $condition";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    return $data['count'];
}


?>