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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!--<form action="register_save.php" method="post">
        <table style="border: 2px solid black; width: 40%;" align="center">
            <tr><td colspan="2" style="background-color: #6cd2fe;">กรอกข้อมูล</td><td></td></tr>
            <tr><td>ชื่อบัญชี :</td><td><input type="text" name="login"></td></tr>
            <tr><td>รหัสผ่าน :</td><td><input type="password" name="pwd"></td></tr>
            <tr><td>ชื่อ-นามสกุล :</td><td><input type="text" name="name"></td></tr>
            <tr><td>เพศ :</td><td><input type="radio" name="gender" value="m">ชาย <br>
            <input type="radio" name="gender" value="f">หญิง <br> 
            <input type="radio" name="gender" value="o">อื่นๆ</td></tr>
            <tr><td>อีเมล: </td><td><input type="text" name="email"></td></tr>
            <tr><td colspan="2" align="center"> <input type="submit" value="สมัครสมาชิก"> </td></td></td></tr>
        </table>
    </form>
    <p align = "center">
        <a href="index.php">
            กลับไปหน้าหลัก
        </a>
    </p>-->
    <script>
        function onblurPWD(){
            let pwd=document.getElementById("pwd");
            let pwd_cmfrm=document.getElementById("pwd_cnfrm");
            if(pwd.value!==pwd_cmfrm.value){
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                pwd.value="";
                pwd_cnfrm.value="";
            }
        }
    </script>

    <div class="container-lg">
        <H1 style="text-align: center;" class="mt-3">
            Webboard KakKak
        </H1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <?php
                    if(isset($_SESSION['add_login'])){
                        if($_SESSION['add_login']=='error'){
                            echo "<div class='alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                        }
                        else{
                            echo "<div class='alert alert-success'>เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['add_login']);
                    }
                ?>
                <div class="card border-primary">
                    <h5 class="card-header bg-primary text-white">เข้าสู่ระบบ</h5>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <label class="col-lg-3 col-form-label" for="login">ชื่อบัญชี :</label>
                                <div class="col-lg-9">
                                    <input id="login" type="text" name="login" class="form-control" required>
                                </div>
                                <label class="col-lg-3 col-form-label mt-3" for="pwd">รหัสผ่าน :</label>
                                <div class="col-lg-9">
                                    <input id="pwd" type="password" name="pwd" class="form-control mt-3" required>
                                </div>
                                <label class="col-lg-3 col-form-label mt-3" for="pwd_cnfrm">ใส่รหัสผ่านซ้ำ :</label>
                                <div class="col-lg-9">
                                    <input id="pwd_cnfrm" type="password" name="pwd_cnfrm" class="form-control mt-3" onblur="onblurPWD()" required>
                                </div>
                                <label class="col-lg-3 col-form-label mt-3" for="name">ชื่อ-นามสกุล :</label>
                                <div class="col-lg-9">
                                    <input id="name" type="text" name="name" class="form-control mt-3" required>
                                </div>
                                <label class="col-lg-3 col-form-label mt-2" for="gender">เพศ :</label>
                                <div class="col-lg-9 mt-3">
                                    <input id="gender" type="radio" name="gender" value="m" required> ชาย<br>
                                    <input id="gender" type="radio" name="gender" value="f" required> หญิง<br>
                                    <input id="gender" type="radio" name="gender" value="o" required> อื่นๆ
                                </div>
                                <label class="col-lg-3 col-form-label mt-3" for="email">อีเมล :</label>
                                <div class="col-lg-9">
                                    <input id="email" type="email" name="email" class="form-control mt-3" required>
                                </div>
                                <label class="col-lg-3 col-form-label mt-3" for=""></label>
                                <div class="col-lg-9 col-form-label mt-3">
                                    <button class="btn btn-primary"><i class="bi bi-box-arrow-down"></i> สมัครสมาชิก</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row mt-4">
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
                <?php
                    /*if(isset($_SESSION['error'])){
                        echo "<div class='alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                        unset($_SESSION['error']);
                    }*/
                ?>
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <table><tr>
                            <div class="form-group mt-3 d-flex">
                                <td><label for="login" class="form-label">ชื่อบัญชี:</label></td>
                                <td><input type="text" name="login" class="form-control" id="login"> </td>
                            </div></tr>
                            <div class="form-group mt-3"><tr>
                                <td><label for="pwd" class="form-label">รหัสผ่าน:</label></td>
                                <td><input type="password" name="pwd" class="form-control" id="pwd"></td>
                            </div></tr>
                            <div class="form-group mt-3"><tr>
                            <td><label for="name" class="form-label">ชื่อ-นามสกุล:</label></td>
                            <td><input type="text" name="name" class="form-control" id="name"></td>
                            </div></tr>
                            <div class="form-group mt-3"><tr>
                            <td><label for="gender" class="form-label">เพศ:</label>
                            <input type="radio" name="gender" value="m"> ชาย <br>
                            <input type="radio" name="gender" value="f"> หญิง <br> 
                            <input type="radio" name="gender" value="o"> อื่นๆ</td>
                            </div></tr>
                            <div class="mt-3 d-flex justify-content-center"><tr>
                                <td><input type="submit" value="Login" class="btn btn-success btn-sm me-2"></td>
                                <td><input type="submit" name="Reset" value="Reset" class="btn btn-danger btn-sm me-2"></td></tr>
                            </div>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                
        <p align="center" class="mt-3">
            ถ้ายังไม่ได้เป็นสมาชิก 
            <a href="register.php">
                กรุณาสมัครสมาชิก
            </a>
        </p>
    </div>-->

</body>
</html>