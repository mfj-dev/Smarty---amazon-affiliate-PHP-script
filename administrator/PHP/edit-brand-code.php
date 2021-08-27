<?php
/**
 * PHP CODE FOR EDIT BRAND  ---- START
 */
$product_brand_url=$_POST['product_brand_url'];
$encoded_product_brand_url=htmlspecialchars ($product_brand_url, ENT_QUOTES);
$product_brand_id = $_GET['id'];
$this_brand_query = "SELECT * FROM product_brands WHERE product_brand_id=$product_brand_id";
if (isset($_POST['update_brand'])) {
    $update_product_brands = 'UPDATE product_brands SET product_brand=:product_brand, product_brand_url=:product_brand_url,
product_brand_title_tag=:product_brand_title_tag,product_brand_meta_tag=:product_brand_meta_tag  WHERE product_brand_id=' . $_GET['id'] . '';
    $stmt = $connwrite->prepare($update_product_brands);
    // bind the parameters and execute the statement
    $stmt->bindParam(':product_brand', $_POST['product_brand'], PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_url', $encoded_product_brand_url, PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_title_tag', $_POST['product_brand_title_tag'], PDO::PARAM_STR);
    $stmt->bindParam(':product_brand_meta_tag', $_POST['product_brand_meta_tag'], PDO::PARAM_STR);
// execute and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
	echo "<script>window.location.replace('brands.php')</script>";
}
/**
 * PHP CODE FOR EDIT BRAND  ---- END
 */