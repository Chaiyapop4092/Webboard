<?php
    session_start();
    $title = $_POST['topic'];
    $content = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    //$cat_id = $_POST['category'];
    //$id = $_POST[session_id()];
    //$post_date = $_POST[NOW()];
    $cat_id = $_POST['category'];
    $post_id = $_POST['id'];

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    echo "Title: $title, Content: $content, Category ID: $cat_id, User ID: $user_id, Post ID: $post_id";

    $sql = "UPDATE post SET title = '$title', content = '$content', cat_id = '$cat_id', user_id = '$user_id' WHERE id = '$post_id'";
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
    $_SESSION['edit'] = "edited";
    $conn = null;
    header("location:editpost.php?id=$post_id");
    die();
?>