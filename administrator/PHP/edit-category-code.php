<?php
/**
 * PHP CODE FOR EDIT CATEGORY  ---- START
 */
$product_category_url=$_POST['product_category_url'];
$encoded_product_category_url=htmlspecialchars ($product_category_url, ENT_QUOTES);
$product_category_id = $_GET['id'];
$this_category_query = "SELECT * FROM product_categories WHERE product_category_id=$product_category_id";
if (isset($_POST['update_category'])) {
        $OK = false;
        $update_products = 'UPDATE product_categories SET product_category=:product_category,product_category_url=:product_category_url, product_category_title_tag=:product_category_title_tag,
  product_category_h1=:product_category_h1,product_category_meta_tag=:product_category_meta_tag WHERE product_category_id=' . $_GET['id'] . '';
        $stmt = $connwrite->prepare($update_products);
        // bind the parameters and execute the statement
        $stmt->bindParam(':product_category', $_POST['product_category'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_url', $encoded_product_category_url, PDO::PARAM_STR);
        $stmt->bindParam(':product_category_title_tag', $_POST['product_category_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_h1', $_POST['product_category_h1'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_meta_tag', $_POST['product_category_meta_tag'], PDO::PARAM_STR);

// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		echo "<script> window.location.replace('categories.php') </script>";
    } 
/**
 * PHP CODE FOR EDIT CATEGORY  ---- END
 */
