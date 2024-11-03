<?php
    session_start();
    $id = $_GET['id'];
    $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql = "SELECT t1.user_id FROM post AS t1 WHERE id='$id'";
    $result=$conn->query($sql);
    $row = $result->fetch();
    if(!isset($_SESSION['id']) || $_SESSION['user_id']!=$row[0]){
        header("location:index.php");
        die();
    }
    /*elseif($_SESSION['user_id']!=$row[0]){
        header("location:index.php");
        die();
    }*/
    $conn=null;
    //$user_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newpost</title>
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
        <div class="row mt-4">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <?php
                    if(isset($_SESSION['edit'])){
                        if($_SESSION['edit']=='edited'){
                            echo "<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['edit']);
                    }
                ?>
                <div class="card text-dark bg-white border-warning">
                    <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
                    <div class="card-body">
                        <form action="editpost_save.php" method="post">
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">หมวดหมู่ :</label>
                                <div class="col-lg-9">
                                    <select name="category" class="form-select">
                                        <?php
                                            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                            $sql="SELECT * FROM category";
                                            foreach($conn->query($sql) as $row){
                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                            }
                                            $conn=null;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">หัวข้อ :</label>
                                <div class="col-lg-9">
                                    <input type="text" name="topic" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-3 col-form-label">เนื้อหา :</label>
                                <div class="col-lg-9">
                                    <textarea name="comment" rows="8" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <center>
                                    <button type="submit" class="btn btn-warning btn-sm" style="color: white;">
                                        <i class="bi bi-box-arrow-down"></i> บันทึกข้อความ
                                    </button>
                                    <input type="hidden" name="id" value=<?php echo "$id"?>>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--
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
    -->
     
</body>
</html>