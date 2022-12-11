<?php
include "dbConnection.php";
include "userBookRenting.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Library-E-Book/php/login.php";

session_start();

$query = "SELECT * 
FROM   `books` 
WHERE  `ISBN` NOT IN 
(SELECT `ISBN` FROM `usersbookshelf`)";

$results = mysqli_query($connection, $query);


?>


<style>
    img {
        width: 100px;
    }
</style>


<!DOCTYPE html>
<html lang="en">

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


    <!-- Paging js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</head>

<body>

    <header class="header">

        <div class="header-1">

            <a href="../index.php" class="logo"> <i class="fas fa-book"></i> bookly </a>

            <?php if (!empty($_SESSION['username'])) {  ?>
                <h1>Welcome back <?php echo $_SESSION['username']; ?></h1>
            <?php } else { ?>
                <h1>E-Library</h1>
            <?php } ?>


            <div class="icons">


                <!---a href="#" class="fas fa-shopping-cart"></a-->

                <div id="login-btn" class="fas fa-user"></div>

            </div>


        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="../index.php">home</a>
                <a href="#">Browsing Books</a>
            </nav>
        </div>

    </header>

    <!-- login form  -->

    <div class="login-form-container real-login-form-container">

        <div id="close-login-btn" class="fas fa-times"></div>

        <form action="" method="POST">
            <h3>sign in</h3>
            <span>username</span>
            <input required type="text" name="txtUsername" class="box" placeholder="enter your username" id="txtUsername">
            <span>password</span>
            <input required type="password" name="txtPassword" class="box" placeholder="enter your password" id="txtPassword">

            <div class="checkbox">
                <input type="checkbox" value="isRememberMe" name="" id="remember-me">
                <label for="remember-me"> remember me</label>
            </div>
            <input type="submit" value="login" name="login" class="btn" onclick="IsRememberMe()">

            <p>don't have an account ? <a href="../Library-E-Book/php/registeration.php">create one</a></p>
            <p><a href="../Library-E-Book/php/loginAdmin.php">Admin Login</a></p>

        </form>

    </div>


    <div class="listing-search-bar">
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>

    <div class="book-list">

        <table id="data" border='1' cellpadding=5 cellspacing=2>
            <thead>
                <tr>
                    <th>Action</th>
                    <th>ISBN</th>
                    <th>Book Title</th>
                    <th>Author </th>
                    <th>Year publication</th>
                    <th>Pulisher</th>
                    <th>Cover</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_assoc($results)) { ?>

                    <tr>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                                <input type="submit" value="add to shelf" name="rentBook" class="btn">
                            </form>
                        </td>
                        <td><?php echo $row['ISBN']; ?> </td>
                        <td><?php echo $row['Book-Title']; ?> </td>
                        <td><?php echo $row['Book-Author']; ?> </td>
                        <td><?php echo $row['Year-Publication']; ?> </td>
                        <td><?php echo $row['Publisher']; ?> </td>
                        <td><img src=" <?php echo $row['Image-URL-L']; ?> " alt="book-cover"></td>
                    </tr>
            </tbody>

        <?php } ?>

        </table>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-arrow-up"></button>

    <script src="../js/pagination.js"></script>
    <script src="../js/login.js"></script>

</body>

</html>