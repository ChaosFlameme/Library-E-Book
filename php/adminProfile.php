<?php
include "dbConnection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<style>

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <header class="header">

        <div class="header-1">

            <a href="../index.php" class="logo"> <i class="fas fa-book"></i> bookly </a>

            <h1>Welcome to the Administrator Page </h1>

            <div class="icons">


                <!---a href="#" class="fas fa-shopping-cart"></a-->

                <div id="login-btn" class="fas fa-user"></div>

                <?php if (!empty($_SESSION['username'])) {  ?>
                    <!-- <a href="#" class="fas fa-heart"></a> -->
                    <script>
                        document.getElementById("login-btn").style.display = "none";
                    </script>

                    <a href="./logout.php" class="fas fa-sign-out-alt"></a>
                <?php } ?>
            </div>


        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="./adminProfile.php">home</a>
                <a href="./adminBookListing.php">Book Management</a>
                <a href="./adminUserListing.php">User Management</a>
            </nav>
        </div>

    </header>

    <div class="card">
        
        <h1><?php echo $_SESSION['adminName']; ?></h1>
        <p class="title">Administrator</p>
        <h2>adminID: <?php echo $_SESSION['adminID']; ?> </h2>
        <p><a href=""><button>Change Password</button></a></p>
    </div>
</body>