<?php
include "dbConnection.php";
session_destroy();
session_start();
if (isset($_POST['adminlogin'])) {
    $username = $_POST['txtAdminID'];
    $password = $_POST['txtAdminPassword'];
    $query = "SELECT * FROM admin WHERE id = '$username' AND password ='$password' ";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if ($count == 1) {

        $_SESSION['username']="Administrator";
        $_SESSION['adminName'] = $row['name'];
        $_SESSION['adminID'] = $row['id'];
        $_SESSION['email']="";
        $_SESSION['uid']="";

        header("Location: /Library-E-Book/php/adminProfile.php");


    } else {
        echo '<script>alert("Login failed.")</script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login-form-container register-form-container">
        <form action="" method="POST">
            <h3>admin sign in</h3>
            <span>ID</span>
            <input required type="text" name="txtAdminID" class="box" placeholder="enter your id" id="txtAdminID">
            <span>password</span>
            <input required type="password" name="txtAdminPassword" class="box" placeholder="enter your password" id="txtAdminPassword">
            <input type="submit" value="login" name="adminlogin" class="btn" >
            <p>Please contact your supervisor for any case</p>
            <a href="../index.php"></a><p>Back to main page</p>
        </form>
    </div>
</body>

</html>