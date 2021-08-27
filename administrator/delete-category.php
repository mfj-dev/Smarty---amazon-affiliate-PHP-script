<?php 
session_start();
include '../security/xss-security.php';
include '../includes/connection.inc.php';
include 'PHP/logincode.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
$product_category_id = $_GET['id'];
$OK = false;
$product_categories_query = "SELECT * FROM product_categories WHERE product_category_id=$product_category_id";
foreach ($connread->query($product_categories_query) as $row) {
    $product_category_image = $row['product_category_image'];
    unlink('../img/' . $product_category_image . '');
}
$OK = false;
$delete_category_query = "DELETE FROM product_categories WHERE product_category_id=$product_category_id";
$stmt = $connwrite->prepare($delete_category_query);
$stmt->execute();
$OK = $stmt->rowCount();
echo "<script>window.location.replace('categories.php')</script>";