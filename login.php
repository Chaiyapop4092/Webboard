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
        <nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i> Home</a>
                <ul class="navbar-nav">
                    <?php
                        if(!isset($_SESSION['id'])){
                            echo "<a href='login.php' class=nav-link style='float: right;'><i class='bi bi-pencil-square'></i>เข้าสู่ระบบ</a>";
                        }
                        else{
                            echo "<li class='nav-item dropdown'>
                                    <a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <i class='bi bi-person-lines-fill'></i> $_SESSION[username]&nbsp
                                    </a>
                                    <ul class='dropdown-menu'>
                                        <li><a class='btn btn-sm dropdown-item' href='logout.php'>
                                        <i class='bi bi-power'></i> ออกจากระบบ
                                        </a></li>
                                    </ul>
                                </li>";
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <div class="card bg-primary text-white">
            <div class="card-body">
                <!--<form action="verify.php" method="post">
                    <table style="border: 2px solid black; width: 40%;" align="center">
                        <tr><td colspan="2" style="background-color: #6cd2fe;"> เข้าสู่ระบบ <td></td></td></tr>
                        <tr><td> Login </td><td><input type="text" name="login"></td></tr>
                        <tr><td> Password </td><td><input type="password" name="pwd"></td></tr>
                        <tr><td colspan="2" align="center"> <input type="submit" value="Login"> </td></td></td></tr> 
                    </table>
                </form>-->
            </div>
        </div>

        <p align="center">
            ถ้ายังไม่ได้เป็นสมาชิก 
            <a href="register.php">
                กรุณาสมัครสมาชิก
            </a>
        </p>
    </div>
</body>
</html>