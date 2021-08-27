<?php 
session_start();
include '../security/xss-security.php';
include '../includes/connection.inc.php';
 include 'PHP/logincode.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
$blog_id = $_GET['id'];
$OK = false;
$delete_article_query = "DELETE FROM blog WHERE blog_id=$blog_id";
$stmt = $connwrite->prepare($delete_article_query);
$stmt->execute();
$OK = $stmt->rowCount();
echo "<script>window.location.replace('blog-articles.php')</script>";