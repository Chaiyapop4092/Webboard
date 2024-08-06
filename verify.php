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

            $login = $_POST['login'];
            $pwd = $_POST['pwd'];

            if($login == "admin" && $pwd == "ad1234") echo "ยินดีต้อนรับคุณ ADMIN <BR>";
            elseif($login == "member" && $pwd == "mem1234") echo "ยินดีต้อนรับคุณ MEMBER <BR>";
            else echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <BR>";

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