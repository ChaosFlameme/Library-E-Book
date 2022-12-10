<?php 
include "dbConnection.php";
session_start();

?>

<html>
    <h1>This is the admin page.</h1>
    <h2><?php echo $_SESSION['adminName'];?></h2>
    <h2><?php echo $_SESSION['adminID'];?> </h2>
    

    <a href="../index.php">
        <button>Back to main page</button>
    </a>
    
</html>