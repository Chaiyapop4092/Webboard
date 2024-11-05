<?php
session_start();


    $categoryName = $_POST['categoryName'];
    /*$sql = "SELECT name FROM category WHERE name = :categoryName";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch();
    }*/

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    /*$sql = "SELECT COUNT(*) FROM category WHERE name = $categoryName";
    $result = $conn->query($sql);*/
    
        $sql = "INSERT INTO category (name) VALUES ('$categoryName')";
        
        $conn->exec($sql);

        $_SESSION['categoryStatus'] = "add";
        $conn = null;
    
    
        $_SESSION['categoryAdd'] = "false";
    
    header("location:category.php");
    die();
?>
