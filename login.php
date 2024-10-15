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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container-lg">
        <H1 style="text-align: center;" class="mt-3">
            Webboard KakKak
        </H1>
        <?php include "nav.php" ?>
        <script>
            function togglePasswordVisibility() {
                let pwd = document.getElementById("pwd");
                let toggleEye = document.getElementById("toggleEye");
                
                if (pwd.type === "password") {
                    pwd.type = "text";
                    toggleEye.classList.remove("bi-eye-fill");
                    toggleEye.classList.add("bi-eye-slash-fill");
                }
                else {
                    pwd.type = "password";
                    toggleEye.classList.remove("bi-eye-slash-fill");
                    toggleEye.classList.add("bi-eye-fill");
                }

                /*let pwd = document.getElementById("pwd");
                let hidePWD = document.getElementById("hideEye");
                let showPWD = document.getElementById("showEye");
                hideEye.classList.remove("d-none");
                if (pwd.type === "password") {
                    pwd.type = "text";
                    showEye.style.display="none";
                    hideEye.style.display="block";
                }
                else {
                    pwd.type = "password";
                    showEye.style.display="block";
                    hideEye.style.display="none";
                }*/

            }
        </script>
        <div class="row mt-4">
            <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
                <?php
                    if(isset($_SESSION['error'])){
                        echo "<div class='alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                        unset($_SESSION['error']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                            <div class="form-group mt-3">
                                <label for="login" class="form-label">Login:</label>
                                <input type="text" name="login" class="form-control" id="login">
                            </div>
                            <div class="form-group mt-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <div class="input-group">
                                    <input type="password" name="pwd" class="form-control" id="pwd">
                                    <span class="input-group-text" onclick="togglePasswordVisibility()">
                                        <i class="bi bi-eye-fill" id="toggleEye"></i>
                                        <!--<i class="bi bi-eye-fill" id="showEye"></i>
                                        <i class="bi bi-eye-slash-fill d-none" id="hideEye"></i>-->
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <input type="submit" value="Login" class="btn btn-success btn-sm me-2">
                                <input type="submit" name="Reset" value="Reset" class="btn btn-danger btn-sm me-2">
                            </div>
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
    </div>
</body>
</html>