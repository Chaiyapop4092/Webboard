<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
    $login=$_POST['login'];
    $pwd=$_POST['pwd'];
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="SELECT * FROM user where login='$login' and password=sha1('$pwd')";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
        $data=$result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username']=$data['login'];
        $_SESSION['role']=$data['role'];
        $_SESSION['user_id']=$data['id'];
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
    }
    else{
        $_SESSION['error']="error";
        header("location:login.php");
        die();
    }
    $conn=null;

    /*
    if($_POST['login'] == "admin" && $_POST['pwd'] == "ad1234"){
        $_SESSION['username']="admin";
        $_SESSION['role']="a";
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
    }
    elseif($_POST['login'] == "member" && $_POST['pwd'] == "mem1234"){
        $_SESSION['username']="member";
        $_SESSION['role']="m";
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
    }
    elseif($_POST['Reset'] == "Reset"){
        unset($_SESSION['error']);
        header("location:login.php");
        die();
    }
    else{
        $_SESSION['error']='error';
        header("location:login.php");
        die();
        //echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <BR>";
    }

    echo "<a href=index.php>
            กลับไปยังหน้าหลัก
            </a>";

        /*echo "เข้าสู่ระบบด้วย <BR>
        Login = $login <BR>
        Password = $pwd <BR>";*/
    ?>