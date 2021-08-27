<?php
/**
 * PHP CODE FOR UPLOAD BLOG IMAGE  ---- START
 */
 $website_logo_query = "SELECT * FROM website_frontend WHERE website_frontend_id=1";
if (isset($_POST['add_website_logo'])) {  
    $allowed_filetypes = array('.jpg', '.jpeg', '.png','.gif');
    $max_filesize = 10485760;
    $upload_path = '../img/';
	$upload_db_path = 'img/';
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
        $update_website_logo= 'UPDATE website_frontend SET website_frontend_logo=:website_frontend_logo WHERE website_frontend_id=1';
        $stmt = $connwrite->prepare($update_website_logo);
        // bind the parameters and execute the statement
        $stmt->bindParam(':website_frontend_logo', $image, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
}
}
/**
 * PHP CODE FOR UPLOAD BLOG IMAGE  ---- END
 */