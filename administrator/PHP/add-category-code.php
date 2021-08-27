<?php
/**
 * PHP CODE FOR CREATE NEW CATEGORY  ---- START
 */
$product_category_url=$_POST['product_category_url'];
$encoded_product_category_url=htmlspecialchars ($product_category_url, ENT_QUOTES);
if (isset($_POST['register_category'])) {
        $OK = false;
        // create database connection
// initialize prepared statement
        // create SQL
        $register_category_query = "INSERT INTO product_categories(product_category,product_category_url,product_category_title_tag,product_category_h1,product_category_meta_tag)
		 	  VALUES(:product_category,:product_category_url,:product_category_title_tag,:product_category_h1,:product_category_meta_tag)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_category_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':product_category', $_POST['product_category'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_url', $encoded_product_category_url, PDO::PARAM_STR);
        $stmt->bindParam(':product_category_title_tag', $_POST['product_category_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_h1', $_POST['product_category_h1'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_meta_tag', $_POST['product_category_meta_tag'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
        header('Location:categories.php');
    }
/**
 * PHP CODE FOR CREATE NEW CATEGORY  ---- END
 */