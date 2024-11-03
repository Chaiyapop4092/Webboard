<?php
    session_start();

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="DELETE FROM category where id=$_GET[id]";
    $conn->exec($sql);  
    $conn=null;
    $_SESSION['categoryStatus'] = "remove";
    header("location:category.php");
    die();
    
?>