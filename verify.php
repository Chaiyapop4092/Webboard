<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
    <style>
        H1{
            text-align: center;
        }
    </style>
</head>
<body>
    <H1>
        Webboard KakKak
    </H1>
    <hr>
    <p align="center">
        <?php
            //echo "<h1 style = 'text-align: center;'>Webboard Kakkak</h1>";

            //$login = $_POST['login'];
            //$pwd = $_POST['pwd'];

            if($_POST['login'] == "admin" && $_POST['pwd'] == "ad1234"){
                $_SESSION['username']="admin";
                $_SESSION['role']="a";
                $_SESSION['id']=session_id();
                echo "ยินดีต้อนรับคุณ ADMIN <BR>";
            }
            elseif($_POST['login'] == "member" && $_POST['pwd'] == "mem1234"){
                $_SESSION['username']="member";
                $_SESSION['role']="m";
                $_SESSION['id']=session_id();
                echo "ยินดีต้อนรับคุณ MEMBER <BR>";
            }
            else{
                echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <BR>";
            }

            echo "<a href=index.php>
                    กลับไปยังหน้าหลัก
                 </a>";

            /*echo "เข้าสู่ระบบด้วย <BR>
            Login = $login <BR>
            Password = $pwd <BR>";*/
        ?>
    </p>
</body>
</html>