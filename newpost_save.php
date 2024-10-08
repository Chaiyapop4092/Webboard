<?php
    session_start();
    $title = $_POST['topic'];
    $content = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    //$cat_id = $_POST['category'];
    //$id = $_POST[session_id()];
    //$post_date = $_POST[NOW()];
    $cat_id = $_POST['category'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="INSERT INTO post (title,content,post_date,cat_id,user_id) VALUES ('$title','$content',NOW(),'$cat_id','$user_id')";
    //$sql="INSERT INTO post (post_date) VALUES (NOW())";
    $conn->exec($sql);
    //$sql="SELECT * FROM user where login='$login'";
    /*$result=$conn->query($sql);
    if($result->rowCount()==1){
        $_SESSION['add_login']="error";
    }
    else{
        $sql1="INSERT INTO user (login, password, name, gender, email, role) VALUES ('$login','$passwd','$name','$gender','$email','m')";
        $conn->exec($sql1);
        $_SESSION['add_login']="success";
    }
    */
    $conn = null;
    header("location:index.php");
    die();
?>