<?php 
include "dbConnection.php";
session_start();

?>

<html>
    <h1>This is the profile page lol.</h1>
    <h2><?php echo $_SESSION['username'];?></h2>
    <h2><?php echo $_SESSION['email'];?> </h2>
    <form action="changePassword.php">
        <input type="submit" value="Change your password">
    </form>
    
</html>