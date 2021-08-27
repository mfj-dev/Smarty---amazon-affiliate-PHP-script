<?php
/*
Pure Uploader PHP Handler v1.0
Author : tQera
*Tested on Windows with PHP 5.2.7*
*/
//You can change the uploads and thumbnails folder below
$product_category_id=$_GET['id'];
define("_UPLOADS", "../../img/");
$img = file_get_contents('php://input');
$temp = explode(',', $img);
$img = $temp[1];
$t = time();
$name = $_SERVER['HTTP_UPLOADER_NAME'];
$isThumb = $_SERVER['HTTP_UPLOADER_THUMB'];
$data = base64_decode($img);
$file = _UPLOADS.$t.$name;
$success = file_put_contents($file, $data);
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
function dbConnect($usertype, $connectionType = 'mysqli')
{
    $host = 'localhost';
    $db = 'amazon_affiliate';
    // the password for this core user is factional
    if ($usertype == 'read') {
        $user = 'admin';
        $pwd = 'admin';
    } elseif ($usertype == 'write') {
        $user = 'admin';
        $pwd = 'admin';
    } else {
        exit('Unrecognized connection type');
    }
    if ($connectionType == 'mysqli') {
        $conn = new mysqli($host, $user, $pwd, $db);
        if ($conn->mysqli_error) {
            die('Cannot open database');
        }
        return $conn;
    } else {
        try {
            return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            echo 'Cannot connect to database';
            exit;
        }
    }
}
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
        $OK = false;
        $update_product_category_image_query = "UPDATE product_categories SET product_category_image='$t$name' WHERE product_category_id=$product_category_id";
        $stmt = $connwrite->prepare($update_product_category_image_query);
        // bind the parameters and execute the statement
// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();


if($success){

    echo "true";

}
else{
    echo "Server failed for file: ".$name;
    }
