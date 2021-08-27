<?php
/**
 * PHP CODE FOR UPLOAD BLOG IMAGE  ---- START
 */
 $blog_id=$_GET['id'];
 $this_blog_article_query = "SELECT * FROM blog WHERE blog_id=$blog_id";
if (isset($_POST['add_blog_image'])) {
   
         $allowed_filetypes = array('.jpg', '.jpeg', '.png','.gif');
    $max_filesize = 10485760;
    $upload_path = '../img/';
    $filename = $_FILES['userfile']['name'];
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
        $update_blog_article_image= 'UPDATE blog SET blog_image=:blog_image WHERE blog_id=' . $blog_id . '';
        $stmt = $connwrite->prepare($update_blog_article_image);
        // bind the parameters and execute the statement
        $stmt->bindParam(':blog_image', $filename, PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
}
}
/**
 * PHP CODE FOR UPLOAD BLOG IMAGE  ---- END
 */