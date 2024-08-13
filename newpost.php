<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newpost</title>
    <style>
        H1{
            text-align: center;
        }
    </style>
</head>
<body>
    <H1> Webboard KakKak </H1>
    <hr>
    <?php
        echo "ผู้ใช้ : $_SESSION[username]";
    ?>
    <br>
    <table >
        <tr><td> หมวดหมู่ : </td><td>
            <select name="category">
                <option value="all">-- ทั้งหมด --</option>
                <option value="general">เรื่องทั่วไป</option>
                <option value="study">เรื่องเรียน</option>
            </select>
        </td></tr>
        <tr><td> หัวข้อ : </td><td><input type="text" topic=""></td></tr>
        <tr><td>เนื้อหา : </td><td><textarea name="#" id="#" cols="#" rows="#"></textarea></td></td></tr>
        <tr><td></td><td><input type="submit" name="#" value="บันทึกข้อความ"></td></tr>
    </table>
     
</body>
</html>