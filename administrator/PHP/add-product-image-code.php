<?php
/**
 * PHP CODE FOR UPLOAD PRODUCT IMAGE  ---- START
 */
 $product_id=$_GET['id'];
 $this_product_query = "SELECT * FROM products WHERE product_id=$product_id";
if (isset($_POST['add_product_image'])) {  
    $allowed_filetypes = array('.jpg', '.jpeg', '.png','.gif');
    $max_filesize = 10485760;
    $upload_path = '../img/';
	$upload_db_path = '';
    $filename = $_FILES['userfile']['name'];
	$image=$upload_db_path . $filename;
    $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);

     if (!in_array($ext, $allowed_filetypes)){
        die('You must upload allowed image type in order to update your database.');
    }
    if (filesize($_FILES['userfile']['tmp_name']) > $max_filesize){
        die('The file you attempted to upload is too large.');
     }
    if (!is_writable($upload_path)){
        die('You cannot upload to the specified directory, please CHMOD it to 777.');
     }

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $filename)) {
       $OK = false;
        $update_product_image= 'UPDATE products SET product_image=:product_image WHERE product_id=' . $product_id . '';
        $stmt = $connwrite->prepare($update_product_image);
        // bind the parameters and execute the statement
        $stmt->bindParam(':product_image', $image, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
}
}
/**
 * PHP CODE FOR UPLOAD PRODUCT IMAGE  ---- END
 */