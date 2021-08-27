<?php
/**
 * PHP CODE FOR CREATE NEW BRAND  ---- START
 */
$product_brand_url=$_POST['product_brand_url'];
$encoded_product_brand_url=htmlspecialchars ($product_brand_url, ENT_QUOTES);
if (isset($_POST['register_brand'])) {
    // create database connection
// initialize prepared statement
    // create SQL
    $register_brand_query = "INSERT INTO product_brands(product_brand,product_brand_url,product_brand_title_tag,product_brand_h1,product_brand_meta_tag)
		 	  VALUES(:product_brand,:product_brand_url,:product_brand_title_tag,:product_brand_h1,:product_brand_meta_tag)";
    // prepare the statement
    $stmt = $connwrite->prepare($register_brand_query);
    // bind the parameters and execute the statement
    $stmt->bindParam(':product_brand', $_POST['product_brand'], PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_url', $encoded_product_brand_url, PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_title_tag', $_POST['product_brand_title_tag'], PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_h1', $_POST['product_brand_h1'], PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_meta_tag', $_POST['product_brand_meta_tag'], PDO::PARAM_STR);
    // execute and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
   header('Location: brands.php');
}
/**
 * PHP CODE FOR CREATE NEW BRAND  ---- END
 */