<?php
include "dbConnection.php";
session_start();
if(isset($_POST['changePassword'])){
    $uid=$_SESSION['uid'];
    $oldPassword=$_POST['txtOldPass'];
    $newPassword=$_POST['txtNewPass'];
    $newPasswordCon =$_POST['txtNewPassCon'];

    $errors=array();

    if($newPassword==$newPasswordCon){
        $query= "SELECT * FROM users WHERE uid= '$uid' AND password = '$oldPassword' LIMIT 1";
        $result=mysqli_query($connection,$query);
        $row=mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);
        if($count ==1){
            
            $query="UPDATE users SET password = '$newPassword' WHERE uid = '$uid'";
            mysqli_query($connection,$query);
            echo '<script>alert("Passowrd changed!")</script>';
            header("refresh:0;  url=/Library-E-Book/userprofile.php");
        }else{
            echo '<script>alert("Old password doesn\'t match.")</script>';
        }
        
    }else{
        echo '<script>alert("New passwords don\'t match.")</script>';
    }

}


?>

<html>
    <form action="" method="post">
        <h1><?php echo $_SESSION['username'];?></h1>
        <label for="txtOldPass">Enter your old password:</label><br>
        <input type="password" name="txtOldPass" id="txtOldPass" placeholder="Verify your account" required><br>
        <label for="txtNewPass">Enter your new password:</label><br>
        <input type="password" name="txtNewPass" id="txtNewPass" class="box" placeholder="enter your password"  required><br>
        <label for="txtNewPassCon">Confirm your new password:</label><br>
        <input type="password" name="txtNewPassCon" id="txtNewPassCon" class="box" placeholder="re-enter your password"  required><br>
        <input type="submit" value="Change your password" name="changePassword" class="btn" >
    </form>

</html>