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
    <title>Category</title>
</head>
<body>
    <div class="container-lg">
        <H1 style="text-align: center;" class="mt-3"> Webboard KakKak </H1>
        <?php include "nav.php" ?>
        <table class="table table-striped mt-4">
            <?php
                $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                $sql = "SELECT t3.id AS category_id, t3.name AS category_name
                        FROM category AS t3
                        ORDER BY t3.id";

        
                
                
                /*else{
                    $sql="SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date, t1.user_id FROM post as t1
                        INNER JOIN user as t2 ON (t1.user_id=t2.id)
                        INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                }*/
                $result=$conn->query($sql);
                echo "<table class='table table-striped' style='width: 60%; margin: auto; table-layout:fixed;'>
                        <tr>
                            <th class='text-left' style='padding-left: 15px;'>ลำดับ</th>
                            <th class='text-alignment-center'>ชื่อหมวดหมู่</th>
                            <th class='text-right' style='width: 9%'>จัดการ</th>
                        </tr>";
                while($row = $result->fetch()){
                    echo "
                        <tr>
                            <td class='text-left' style='padding-left: 30px;'>$row[0]</td>
                            <td class='text-center' style='padding-right: 255px;'>$row[1]</td>
                            <td class='d-flex align-items-center justify-content-end'>
                                <a href='editpost.php?id={$row[0]}' class='btn btn-warning btn-sm float-end me-2'><i class='bi bi-pencil'></i></a>
                                <a href='delete.php?id={$row[0]}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>
                            </td>
                        </tr>";
                    /*if (isset($_SESSION['id'])){
                        if ($_SESSION['user_id'] == $row[5]) {
                            echo "<div>
                                    <a href='delete.php?id={$row[2]}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>
                                    <a href='editpost.php?id={$row[2]}' class='btn btn-warning btn-sm float-end me-2'><i class='bi bi-pencil'></i></a>
                                  </div>";
                        } elseif ($_SESSION['role'] == "a") {
                            echo "<div>
                                    <a href='delete.php?id={$row[2]}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>
                                  </div>";
                        }
                        if($_SESSION['role'] == "a" || $_SESSION['id'] == $row['user_id']){
                            echo "<div>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm float-end' onclick='return myFunction();'><i class='bi bi-trash'></i></a>        
                                    <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm float-end me-2'><i class='bi bi-pencil'></i> Edit</a>
                                </div>";
                        }
                    }*/
                    //echo "</td></tr>";
                }
                echo "</table>";
                echo "<center><button type='button' class='btn btn-success mt-3' data-bs-toggle='modal' data-bs-target='#addCategoryModal'>
                        <i class='bi bi-plus-circle'></i> เพิ่มหมวดหมู่ใหม่
                    </button></center>";
                /*$post="SELECT post.id FROM post";
                $result=$conn->query($post);
                while($row=$result->fetch()){
                    if(isset($_SESSION['id']) && $_SESSION['role']=="a"){
                        echo "&nbsp&nbsp
                        <a href=delete.php?id=$row[0] class='btn btn-danger btn-sm me-3' style='float: right;'><i class='bi bi-trash'></i></a>";
                    }
                    echo "</td></tr>";
                }*/
                //$conn=null;
            ?>
            
        </table>
    </div>