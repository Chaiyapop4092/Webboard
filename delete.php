<?php
    $id = $_GET['id'];
    session_start();
    if(!(isset($_SESSION['id']) && $_SESSION['role']=="a")){
        header("location:index.php");
        die();
    }
    echo "ลบกระทู้ หมายเลข $id"; 
?>