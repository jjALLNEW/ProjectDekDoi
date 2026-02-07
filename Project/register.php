<?php
session_start();
require_once "db.php";

if(isset($_POST['register'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email นี้มีคนใช้แล้ว');</script>";
    }else{

        $sql = "INSERT INTO users(email,password)
                VALUES('$email','$hash')";

        if(mysqli_query($conn,$sql)){
            echo "<script>
                    alert('สมัครสำเร็จ');
                    window.location='index.php';
                  </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ใช้ไฟล์ style เดิมจาก template -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <div class="login100-pic js-tilt">
                <img src="images/img-01.png">
            </div>

            <!-- ✅ ฟอร์มสมัคร -->
            <form class="login100-form validate-form" method="POST">

                <span class="login100-form-title">
                    Create Account
                </span>

                <!-- Email -->
                <div class="wrap-input100">
                    <input class="input100" type="email" name="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                </div>

                <!-- Password -->
                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    <span class="focus-input100"></span>
                </div>

                <!-- ปุ่มสมัคร -->
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="register">
                        Register
                    </button>
                </div>

                <!-- กลับไป login -->
                <div class="text-center p-t-20">
                    <a href="index.php">
                        Already have account? Login
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>

<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
