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
    <title>register</title>
</head>
<body>
    <H1 align = "center">
        สมัครสมาชิก
    </H1>
    <hr>
    <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" style="background-color: #6cd2fe;">กรอกข้อมูล</td><td></td></tr>
        <tr><td>ชื่อบัญชี :</td><td><input type="text" name="regAcc"></td></tr>
        <tr><td>รหัสผ่าน :</td><td><input type="password" name="regPwd"></td></tr>
        <tr><td>ชื่อ-นามสกุล :</td><td><input type="text" name="regName"></td></tr>
        <tr><td>เพศ :</td><td><input type="radio" name="regM">ชาย <br>
        <input type="radio" name="regF">หญิง <br> 
        <input type="radio" name="regO">อื่นๆ</td></tr>
        <tr><td>อีเมล: </td><td><input type="text" name="regEmail"></td></tr>
        <tr><td colspan="2" align="center"> <input type="submit" value="สมัครสมาชิก"> </td></td></td></tr>
    </table>
    <p align = "center">
        <a href="index.php">
            กลับไปหน้าหลัก
        </a>
    </p>
</body>
</html>