<?php
/**
 * PHP CODE FOR UPDATING PRODUCT OPTIONS  ---- START
 */
$product_id = $_GET['id'];
$product_url=$_POST['product_url'];
$encoded_product_url=htmlspecialchars ($product_url, ENT_QUOTES);
$this_product_query = "SELECT * FROM products WHERE product_id=$product_id";
if (isset($_POST['update_product'])) {
 
        $OK = false;
        $update_products = "UPDATE products SET product_name=:product_name, product_url=:product_url,product_amazon_url=:product_amazon_url, product_title_tag=:product_title_tag,
 product_price=:product_price,product_review=:product_review, product_pros=:product_pros, product_cons=:product_cons,product_avg_rating=:product_avg_rating  WHERE product_id=$product_id";
        $stmt = $connwrite->prepare($update_products);
        // bind the parameters and execute the statement
        $stmt->bindParam(':product_name', $_POST['product_name'], PDO::PARAM_STR);
        $stmt->bindParam(':product_url', $encoded_product_url, PDO::PARAM_STR);
        $stmt->bindParam(':product_amazon_url', $_POST['product_amazon_url'], PDO::PARAM_STR);
        $stmt->bindParam(':product_title_tag', $_POST['product_title_tag'], PDO::PARAM_STR);
        $stmt->bindParam(':product_price', $_POST['product_price'], PDO::PARAM_STR);
        $stmt->bindParam(':product_review', $_POST['product_review'], PDO::PARAM_STR);
        $stmt->bindParam(':product_pros', $_POST['product_pros'], PDO::PARAM_STR);
        $stmt->bindParam(':product_cons', $_POST['product_cons'], PDO::PARAM_STR);
        $stmt->bindParam(':product_avg_rating', $_POST['product_avg_rating'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		header('Location:products.php');
           }

/**
 * PHP CODE FOR UPDATING PRODUCT OPTIONS  ---- END
 */
