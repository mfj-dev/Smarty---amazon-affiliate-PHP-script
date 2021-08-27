<?php 
session_start();
include '../security/xss-security.php';
include '../includes/connection.inc.php';
include 'PHP/logincode.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
$product_id = $_GET['id'];
$OK = false;
$delete_product_query = "DELETE FROM products WHERE product_id=$product_id";
$stmt = $connwrite->prepare($delete_product_query);
$stmt->execute();
$OK = $stmt->rowCount();
echo "<script>window.location.replace('products.php')</script>";