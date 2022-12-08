<?php
include "dbConnection.php";

if (isset($_POST['register'])) {
    $username = $_POST['txtUsername'];
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $passwordCon = $_POST['txtPasswordCon'];

    $errors = array();

    //Validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $passwordCon) {
        array_push($errors, "The two passwords do not match");
    }

    $email_check_query = "SELECT * FROM users where email = '$email' LIMIT 1";
    $result = mysqli_query($connection, $email_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "Email already registered");
        }
    }

    //Check if there's no error
    if (count($errors) == 0) {
        //Get uid from sql
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
            echo '<script>alert("Register Failed!")</script>';
        }
    }else{
        foreach($errors as $error){
            echo "value <br>";
        }
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
            <input type="text" name="txtUsername" class="box" placeholder="enter your username" id="txtUsername" required>
            
            <span>email</span>
            <input type="email" name="txtEmail" class="box" placeholder="enter your email" id="txtEmail " required>
            
            <span>password</span>
            <input type="password" name="txtPassword" class="box" placeholder="enter your password" id="txtPassword" required>
            
            <span>confirm your password</span>
            <input type="password" name="txtPassword" class="box" placeholder="re-enter your password" id="txtPasswordCon" required>
            <div class="checkbox">
                <input required type="checkbox" name="" id="agree-terms">
                <label for="agree-terms">I agree with
                    <a href="#">the terms of services</a></label>
            </div>
            <input type="submit" value="register" name="register" class="btn">
            <p>Already have an account ? <a href="../index.php">Back to main page</a></p>
        </form>
    </div>
</body>

</html>