<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
    <style>
        H1{
            text-align: center;
        }
    </style>
</head>
<body>
    <H1> Webboard KakKak </H1>
    <hr>
    หมวดหมู่ : 
    <select name="category">
        <option value="all">-- ทั้งหมด --</option>
        <option value="general">เรื่องทั่วไป</option>
        <option value="study">เรื่องเรียน</option>
    </select>

    <?php
        if(!isset($_SESSION['id'])){
            echo "<a href='login.php' style='float: right;'>เข้าสู่ระบบ</a>";
        }
        else{
            echo "<span style='float: right;'>ผู้ใช้งานระบบ : $_SESSION[username]
                 &nbsp <a href='logout.php'>ออกจากระบบ</a></span>";
        }
    ?>
    
    <?php
        /*if(!isset($_SESSION['id'])){
    ?>
        <a href="login.php" style="float: right;">เข้าสู่ระบบ</a>
    <?php
        }else{
    ?>
        <a href="logout.php" style="float: right;">ออกจากระบบ</a>
    <?php
        }*/
    ?>
    
    <br>
    <a href="newpost.php" style="float: left;">สร้างกระทู้ใหม่</a>
    <br>
    <br>
    <ul>
        <?php
            for($i = 1; $i <= 10; $i++){
                echo "<li><a href=post.php?id=$i>
                        กระทู้ที่ $i
                    </a>";
                if(isset($_SESSION['id']) && $_SESSION['role']=="a"){
                    echo "&nbsp&nbsp
                    <a href=delete.php?id=$i>
                        ลบ
                    </a>";
                }
                echo "</li>";
            }
        ?>
    </ul>
</body>
</html>