<?php
session_start();


    $categoryName = $_POST['editCategoryName'];
    $editCategoryId = $_POST['editCategoryId'];
    echo "$editCategoryId";
    /*$sql = "SELECT name FROM category WHERE name = :categoryName";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch();
    }*/

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

    $sql = "UPDATE category SET name = '$categoryName' WHERE id = '$editCategoryId'";
    $conn->exec($sql);

    $_SESSION['categoryStatus'] = "edit";
    $conn = null;
    header("location:category.php");
    die();
?>