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
    <title>User</title>
</head>
<body>
    <div class="container-lg">
        <H1 style="text-align: center;" class="mt-3"> Webboard KakKak </H1>
        <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-sm-12 col-md-11 col-lg-10 mx-auto">
                <?php
                    if(isset($_SESSION['categoryStatus'])){
                        if($_SESSION['categoryStatus']=='add'){
                            echo "<div class='alert alert-success'>เพิ่มหมวดหมู่เรียบร้อยแล้ว</div>";
                        }
                        elseif($_SESSION['categoryStatus']=='remove'){
                            echo "<div class='alert alert-success'>ลบหมวดหมู่เรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['categoryStatus']);
                    }
                ?>
                <table class="table table-striped mt-4">
                    <?php
                        $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                        $sql = "SELECT id,login,name,gender,email,role FROM user ORDER BY id";
                        $result=$conn->query($sql);
                        echo "<table class='table table-striped' style='width: 100%; table-layout: fixed;'>
                                <tr>
                                    <th class='text-center'>ลำดับ</th>
                                    <th class='text-center'>ชื่อผู้ใช้</th>
                                    <th class='text-center'>ชื่อ-นามสกุล</th>
                                    <th class='text-center'>เพศ</th>
                                    <th class='text-center'>อีเมล</th>
                                    <th class='text-center'>สิทธิ์</th>
                                    <th class='text-center'>จัดการ</th>
                                </tr>";
                        while($row = $result->fetch()){
                            echo "
                                <tr>
                                    <td class='text-center'>$row[0]</td>
                                    <td class='text-center'>$row[1]</td>
                                    <td class='text-center'>$row[2]</td>
                                    <td class='text-center'>$row[3]</td>
                                    <td class='text-center'>$row[4]</td>
                                    <td class='text-center'>$row[5]</td>
                                    <td class='text-center'>
                                        <button type='button' class='btn btn-warning btn-sm me-2' data-bs-toggle='modal' data-bs-target='#editUserModal'
                                        data-id='{$row[0]}' data-userName='{$row[1]}' 
                                        data-fullName='{$row[2]}' data-gender='{$row[3]}' 
                                        data-email='{$row[4]}' data-role='{$row[5]}'>
                                            <i class='bi bi-pencil'></i>
                                        </button>
                                    </td>
                                </tr>";
                                echo '
                                <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editUserModalLabel">แก้ไขข้อมูลผู้ใช้</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editUserForm" method="post" action="edituser.php">
                                                    <input type="hidden" id="editUserId" name="userID" value="">
                                                    <div class="mb-3">
                                                        <label for="userName" class="form-label">ชื่อผู้ใช้:</label>
                                                        <input type="text" class="form-control" id="userName" name="userName" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="fullName" class="form-label">ชื่อ-นามสกุล:</label>
                                                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="userGender" class="form-label">เพศ:</label>
                                                        <select class="form-select" id="userGender" name="userGender" required>
                                                            <option id="currentGender" value="" disabled selected></option>
                                                            <option value="male">ชาย</option>
                                                            <option value="female">หญิง</option>
                                                            <option value="other">อื่นๆ</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="userEmail" class="form-label">อีเมล:</label>
                                                        <input type="text" class="form-control" id="userEmail" name="userEmail" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="userRole" class="form-label">สิทธิ์:</label>
                                                        <input type="text" class="form-control" id="userRole" name="userRole" required>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                <button type="submit" class="btn btn-primary" form="editUserForm">บันทึก</button>
                                            </div>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function () {
                                                    var editButtons = document.querySelectorAll(".btn-warning");
                                                    editButtons.forEach(function (button) {
                                                        button.addEventListener("click", function () {
                                                            var userId = this.getAttribute("data-id");
                                                            var userName = this.getAttribute("data-userName");
                                                            var fullName = this.getAttribute("data-fullName");
                                                            var gender = this.getAttribute("data-gender");
                                                            var email = this.getAttribute("data-email");
                                                            var role = this.getAttribute("data-role");

                                                            document.getElementById("editUserId").value = userId;
                                                            document.getElementById("userName").value = userName;
                                                            document.getElementById("fullName").value = fullName;
                                                            document.getElementById("currentGender").innerHTML = gender;
                                                            document.getElementById("userEmail").value = email;
                                                            document.getElementById("userRole").value = role;
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                ';
                        }
                        echo "</table>";
                    ?>
                    <!--<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">แก้ไขข้อมูลผู้ใช้</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editUserForm" method="post" action="edituser.php">
                                        <input type="hidden" id="editUserId" name="userID" value="">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">ชื่อผู้ใช้:</label>
                                            <input type="text" class="form-control" id="userName" name="userName" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">ชื่อ-นามสกุล:</label>
                                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userGender" class="form-label">เพศ:</label>
                                            <select class="form-select" id="userGender" name="userGender" required>
                                                <option id="currentGender" value="" disabled selected>เลือกเพศ</option>
                                                <option value="male">ชาย</option>
                                                <option value="female">หญิง</option>
                                                <option value="other">อื่นๆ</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">อีเมล:</label>
                                            <input type="text" class="form-control" id="userEmail" name="userEmail" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userRole" class="form-label">สิทธิ์:</label>
                                            <input type="text" class="form-control" id="userRole" name="userRole" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="submit" class="btn btn-primary" form="editUserForm">บันทึก</button>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () { // Correct event name
                                        var editButtons = document.querySelectorAll('.btn-warning');
                                        editButtons.forEach(function (button) {
                                            button.addEventListener('click', function () {
                                                var userId = this.getAttribute('data-id');
                                                var userName = this.getAttribute('data-userName');
                                                var fullName = this.getAttribute('data-fullName');
                                                var gender = this.getAttribute('data-gender');
                                                var email = this.getAttribute('data-email');
                                                var role = this.getAttribute('data-role');

                                                document.getElementById('editUserId').value = userId;
                                                document.getElementById('userName').value = userName; 
                                                document.getElementById('fullName').value = fullName;
                                                document.getElementById('userGender').innerHTML = gender;
                                                document.getElementById('userEmail').value = email; 
                                                document.getElementById('userRole').value = role;
                                            });
                                        });
                                    });
                                </script>


                            </div>
                        </div>
                    </div>-->

                </table>
            </div>
        </div>
    </div>
</body>
</html>