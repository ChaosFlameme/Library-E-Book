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
            header("Location: /Library-E-Book/php/oyasumi.php");
            function_alert("Yeah seem it works lol");
            
        }else{
            function_alert("Nah can't sign in.");
        }
    }

?>
