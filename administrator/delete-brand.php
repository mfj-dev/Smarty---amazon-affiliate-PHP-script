<?php 
session_start();
include '../security/xss-security.php';
include '../includes/connection.inc.php';
include 'PHP/logincode.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
$baseurl = $_SERVER['SERVER_NAME'];
$product_brand_id = $_GET['id'];
$OK = false;
$product_brand_query = "SELECT * FROM product_brands WHERE product_brand_id=$product_brand_id";
$OK = false;
$delete_brand_query = "DELETE FROM product_brands WHERE product_brand_id=$product_brand_id";
$stmt = $connwrite->prepare($delete_brand_query);
$stmt->execute();
$OK = $stmt->rowCount();
		echo "<script>window.location.replace('brands.php')</script>";