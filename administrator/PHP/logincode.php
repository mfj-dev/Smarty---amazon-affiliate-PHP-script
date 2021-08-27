<?php
/**
 * LOGIN PHP CODE  ---- START
 */
 if (isset($_POST['login'])) {
    $admin_username=$_POST["admin_username"];
    $admin_password=$_POST["admin_password"];
    $admin_username = stripslashes($admin_username);
    $admin_password = stripslashes($admin_password);
    $loginquery = "SELECT * FROM admin WHERE admin_username='" . $admin_username  . "' and admin_password = '". $admin_password ."'";
    $stmt = $connwrite->prepare($loginquery);
  // bind the parameters and execute the statement	
  // execute and get number of affected rows
    $stmt->execute();
    $OK = $stmt->rowCount();
    foreach ($connread->query($loginquery) as $row) {
         $_SESSION["admin_id"] = $row['admin_id'];
        } 
    }
if (!isset($_SESSION["admin_id"])) {
    header('Location:login.php');
} 
/**
 * LOGIN PHP CODE  ---- END
 */