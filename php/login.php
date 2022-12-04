<?php
    include "dbConnection.php";
    session_start();
    if(isset($_POST['login'])){
        $username =$_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $query= "SELECT * FROM users WHERE username= '$username' AND password ='$password' ";
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result);
        $count =mysqli_num_rows($result);
        if($count == 1){
            //record found
            echo 'login successfully';
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];
            $_SESSION['uid']=$row['uid'];

            echo '<br>';
            echo 'Username: ' . $_SESSION['fullname']. '<br>';
            echo 'Email: ' . $_SESSION['email'].'<br>';
            echo 'ID: ' . $_SESSION['uid'].'<br>';
            //header("Location:index.php");
        }else{
            echo 'invalid credentials';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Page</h1>
    <form action="" method="POST">
        Username: <input type="text" name="txtUsername" id="txtUsername">
        <br>
        Password: <input type="password" name="txtPassword" id="txtPassword">
        <br>
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>