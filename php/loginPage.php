<?php
include "dbConnection.php";
include "login.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="login-form-container register-form-container">

        <form action="" method="POST">
            <h3>sign in</h3>
            <span>username</span>
            <input required type="text" name="txtUsername" class="box" placeholder="enter your username" id="txtUsername">
            <span>password</span>
            <input required type="password" name="txtPassword" class="box" placeholder="enter your password" id="txtPassword">

            <div class="checkbox">
                <input type="checkbox" value="isRememberMe" name="" id="remember-me">
                <label for="remember-me"> remember me</label>
            </div>
            <input type="submit" value="login" name="login" class="btn" onclick="IsRememberMe()">

            <p>don't have an account ? <a href="../Library-E-Book/php/registeration.php">create one</a></p>
            <p><a href="../Library-E-Book/php/loginAdmin.php">Admin Login</a></p>
            <p>Back to <a href="/Library-E-Book/index.php">Main Page</a></p>

        </form>

    </div>
</body>

</html>