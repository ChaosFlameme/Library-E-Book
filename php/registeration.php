<?php
include "dbConnection.php";

if (isset($_POST['btnRegister'])) {
    $username = $_POST['txtUsername'];
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword']; //Encrypted password

    $sql = "SELECT MAX(uid) AS maxuid FROM users";
    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);
    $uid = $row['maxuid'] + 1;

    $query = "INSERT INTO users (uid, username, email, password) 
    VALUES ('$uid', '$username','$email','$password')";

    if (mysqli_query($connection, $query)) {
        echo '<script>alert("Register sucessfully!")</script>';
        header("refresh:0;  url=/Library-E-Book/index.php");

    } else {
        echo '<script>alert("Register sucessfully!")</script>';
    }
}
mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login-form-container register-form-container">
        <form action="" method="POST">
            <h3>register</h3>
            <span>username</span>
            <input type="text" name="txtUsername" class="box" placeholder="enter your username" id="txtUsername">
            <span>email</span>
            <input type="email" name="txtEmail" class="box" placeholder="enter your email" id="txtEmail ">
            <span>password</span>
            <input type="password" name="txtPassword" class="box" placeholder="enter your password" id="txtPassword">
            <div class="checkbox">
                <input type="checkbox" name="" id="agree-terms">
                <label for="agree-terms">I agree the terms of services of this site</label>
            </div>
            <input type="submit" value="register" name="register" class="btn">
        </form>
    </div>
</body>

</html>