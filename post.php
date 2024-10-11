<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
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
        <?php
            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $post="SELECT post.title,post.content,user.login,post.post_date FROM post INNER JOIN user ON (post.user_id=user.id) WHERE post.id=$_GET[id]";
            $result=$conn->query($post);
            while($row=$result->fetch()){
                echo "<div class='card border-primary m-5 col-lg-8 mx-auto'>
                <div class='card-header bg-primary text-white'>$row[0]</div>
                <div class='card-body'>$row[1]
                <div class='mt-2'>$row[2] - $row[3]</div></div></div>";
            }
            $i=1;
            $comment="SELECT comment.id,comment.content,user.login,comment.post_date FROM comment INNER JOIN user ON (comment.user_id=user.id) WHERE comment.post_id=$_GET[id] ORDER BY comment.post_date ASC";
            $result=$conn->query($comment);
            while($row=$result->fetch()){
                echo "<div class='card border-info m-5 col-lg-8 mx-auto'>
                <div class='card-header bg-info text-white'>ความคิดเห็นที่ $i</div>
                <div class='card-body'>$row[1]
                <div class='mt-2'>$row[2] - $row[3]</div></div></div>";
                $i++;
            }
            $conn=null;
        ?>  
        <div class="card text-dark bg-white border-success m-5 col-lg-8 mx-auto ">
            <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?=$_GET['id'];?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white">
                                    <i class="bi bi-box-arrow-up-right-me-1"></i>ส่งข้อความ
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!--<center>
        <p>
        <?php
                /*$id = $_GET['id'];
                echo "ต้องการดูกระทู้หมายเลข $id <BR> เป็นกระทู้หมายเลข";
                if($id % 2 == 0) echo "คู่";
                else echo "คี่"*/
            ?> 
        </p>
        <table style="border: 2px solid black; width: 40%;" align="center">
        <tr><td colspan="2" style="background-color: #6cd2fe;"> แสดงความคิดเห็น </td></tr>
            <tr><td><center><textarea name="#" id="#" cols="#" rows="#"></textarea></td></td></tr>
            <tr><td><center><input type="submit" name="#" value="ส่งข้อความ"></center></td></tr>
        </table>
        <br>
        <a href="index.php">
            กลับไปยังหน้าหลัก
        </a>
    </center>-->