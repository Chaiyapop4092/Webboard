<?php
    session_start();
    $name = $_POST['fullName'];
    $gender = $_POST['userGender'];
    $email = $_POST['userEmail'];
    //$cat_id = $_POST['category'];
    //$id = $_POST[session_id()];
    //$post_date = $_POST[NOW()];
    $role = $_POST['userRole'];
    $id = $_POST['userID'];
    echo "$gender";
    echo "$role";
    /*if(empty($gender)){
        $gender = $_POST['hiddenUserGender'];
    }
    if(empty($role)){
        $role = $_POST['hiddenUserRole'];
    }*/

    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    //echo "Title: $title, Content: $content, Category ID: $cat_id, User ID: $user_id, Post ID: $post_id";

    $sql = "UPDATE user SET name = '$name', gender = '$gender', email = '$email', role = '$role' WHERE id = '$id'";
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
    $_SESSION['userStatus'] = "edit";
    $conn = null;
    header("location:user.php");
    die();
?>