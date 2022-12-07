<?php
    include "dbConnection.php";
    include "misc.php";
    session_start();
    if(isset($_POST['login'])){
        $username =$_POST['txtUsername'];
        $password = $_POST['txtPassword'];
        $query= "SELECT * FROM users WHERE username= '$username' AND password ='$password' ";
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result);
        $count =mysqli_num_rows($result);
        if($count == 1){

            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];
            $_SESSION['uid']=$row['uid'];
            header("Location: /Library-E-Book/php/oyasumi.php");
            
            
        }else{
            echo '<script>alert("register sucessfully!")</script>';
        }
    }

?>
