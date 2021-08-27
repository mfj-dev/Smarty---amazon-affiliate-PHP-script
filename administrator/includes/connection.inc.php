<?php
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
function dbConnect($usertype, $connectionType = 'mysqli')
{
    $host =  'localhost';
    $db = 'smarty';
    // the password for this core user is factional
    if ($usertype == 'read') {
        $user = 'branko';
        $pwd =  'branko';
    } elseif ($usertype == 'write') {
        $user = 'branko';
        $pwd = 'branko';
    } else {
        exit('Unrecognized connection type');
    }
    if ($connectionType == 'mysqli') {
        $conn = new mysqli($host, $user, $pwd, $db);
        if ($conn->mysqli_error) {
            die('Cannot open database');
        }
        return $conn;
    } else {
        try {
            return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            echo 'Cannot connect to database';
            exit;
        }
    }
}