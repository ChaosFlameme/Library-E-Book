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

            <h1>Welcome back <?php echo $_SESSION['username']; ?></h1>

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
                <a href="./userprofile.php">home</a>
                <a href="./userBookListing.php">My bookshelf</a>
                <a href="./userBookBrowsing.php">Browsing Books</a>
            </nav>
        </div>

    </header>

    <?php if (!empty($_SESSION['username'])) { ?>

        <div class="card">
            <h1><?php echo $_SESSION['username']; ?></h1>
            <p class="title">Member</p>
            <h2>Email: <?php echo $_SESSION['email']; ?> </h2>
            <h2>UID: <?php echo $_SESSION['uid']; ?></h2>
            <p><a href="./changePassword.php"><button>Change Password</button></a></p>
        </div>

    <?php } else { ?>
        <div class="card">
            <h1>login</h1>
            <h1>to</h1>
            <h1>access</h1>
            <p><a href="./loginPage.php"><button>Login</button></a></p>
        </div>
    <?php } ?>


</body>