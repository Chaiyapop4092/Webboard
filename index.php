<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard</title>
</head>
<body>
    <div class="container-lg">
        <H1 style="text-align: center;" class="mt-3"> Webboard KakKak </H1>
        <script>
            function myFunction(){
                let r=confirm("ต้องการจะลบจริงหรือไม่");
                return r;
            }
        </script>
        <?php include "nav.php" ?>
        <div class="mt-3">
            <label>หมวดหมู่</label>
            <span class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                    --ทั้งหมด--
                </button>
                <ul class="dropdown-menu" aria-labelledby="Button2">
                    <li><a href="index.php" class="dropdown-item">ทั้งหมด</a></li>
                    <?php
                        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        $sql="SELECT * FROM category";
                        foreach($conn->query($sql) as $row){
                            echo "<li><a href='?category={$row['id']}' class=dropdown-item>$row[name]</a></li>";
                        }
                        $conn=null;
                    ?>
                </ul>
            </span>
            <?php
                if(isset($_SESSION['id'])){
                    echo "<a href='newpost.php' class='btn btn-success btn-sm' style='float: right;'><i class='bi bi-plus'></i> สร้างกระทู้ใหม่</button></a>";
                }
            ?>
        </div>
        <table class="table table-striped mt-4">
            <?php
                $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                if (isset($_GET['category'])) {
                    $category = $_GET['category'];
                    $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date, t1.user_id FROM post as t1
                        INNER JOIN user as t2 ON (t1.user_id=t2.id)
                        INNER JOIN category as t3 ON (t1.cat_id=t3.id) WHERE t1.cat_id = $category ORDER BY t1.post_date DESC";
                }
                else{
                    $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date, t1.user_id FROM post as t1
                        INNER JOIN user as t2 ON (t1.user_id=t2.id)
                        INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                }
                $result=$conn->query($sql);
                while($row = $result->fetch()){
                    echo "<tr><td class='d-flex justify-content-between'>
                    <div>[ $row[0] ] <a href=post.php?id=$row[2]
                    style=text-decoration:none>$row[1]</a><br>$row[3] - $row[4]</div>";
                    if (isset($_SESSION['id'])){
                        if ($_SESSION['user_id'] == $row[5]) {
                            echo "<div>
                                    <a href='delete.php?id={$row[2]}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>
                                    <a href='edit.php?id={$row[2]}' class='btn btn-warning btn-sm float-end me-2'><i class='bi bi-pencil'></i> Edit</a>
                                  </div>";
                        } elseif ($_SESSION['role'] == "a") {
                            echo "<div>
                                    <a href='delete.php?id={$row[2]}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>
                                  </div>";
                        }
                        /*if($_SESSION['role'] == "a" || $_SESSION['id'] == $row['user_id']){
                            echo "<div>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>        
                                    <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm float-end me-2'><i class='bi bi-pencil'></i> Edit</a>
                                </div>";
                        }*/
                    }
                    echo "</td></tr>";
                }
                /*$post="SELECT post.id FROM post";
                $result=$conn->query($post);
                while($row=$result->fetch()){
                    if(isset($_SESSION['id']) && $_SESSION['role']=="a"){
                        echo "&nbsp&nbsp
                        <a href=delete.php?id=$row[0] class='btn btn-danger btn-sm me-3' style='float: right;'><i class='bi bi-trash'></i></a>";
                    }
                    echo "</td></tr>";
                }*/
                $conn=null;
            ?>  
        </table>
        
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
        <br>
        <br>
        <ul>
        </ul>
    </div>
</body>
</html>