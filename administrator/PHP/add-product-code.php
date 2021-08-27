<?php
/**
 * PHP CODE FOR REGISTER PRODUCT  ---- START
 */
$product_url=$_POST['product_url'];
$encoded_product_url=htmlspecialchars ($product_url, ENT_QUOTES);
if (isset($_POST['register_product'])) {  
        $OK = false;
        // create database connection
// initialize prepared statement
        // create SQL
        $register_product_query = "INSERT INTO products(product_name,product_url,product_amazon_url,product_title_tag,product_category_id,product_brand_id,product_price,product_review,product_pros,product_cons,product_avg_rating)
		 	  VALUES(:product_name,:product_url,:product_amazon_url,:product_title_tag,:product_category_id,:product_brand_id,:product_price,:product_review,:product_pros,:product_cons,:product_avg_rating)";
        // prepare the statement
        $stmt = $connwrite->prepare($register_product_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':product_name', $_POST['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(':product_url', $encoded_product_url, PDO::PARAM_STR);
        $stmt->bindParam(':product_amazon_url', $_POST['product_amazon_url'], PDO::PARAM_STR);
        $stmt->bindParam(':product_title_tag', $_POST['product_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':product_category_id', $_POST['product_category'], PDO::PARAM_STR);
        $stmt->bindParam(':product_brand_id', $_POST['product_brands'], PDO::PARAM_STR);
        $stmt->bindParam(':product_price', $_POST['product_price'], PDO::PARAM_STR);
        $stmt->bindParam(':product_review', $_POST['product_review'], PDO::PARAM_STR);
        $stmt->bindParam(':product_pros', $_POST['product_pros'], PDO::PARAM_STR);
        $stmt->bindParam(':product_cons', $_POST['product_cons'], PDO::PARAM_STR);
        $stmt->bindParam(':product_avg_rating', $_POST['product_avg_rating'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location: products.php');
    
}

/**
 * PHP CODE FOR REGISTER PRODUCT  ---- END
 */
