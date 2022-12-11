<?php
include "dbConnection.php";
include "userBookRemove.php";
session_start();

$uid = $_SESSION['uid'];


$query = "SELECT * FROM books WHERE 
ISBN IN ( SELECT ISBN FROM usersbookshelf
WHERE userID = '$uid')";

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

            <h1><?php echo $_SESSION['username']; ?>'s bookshelf</h1>

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

    <div class="listing-search-bar">
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>

    <div class="book-list">

        <?php if (mysqli_num_rows($results)==0) { ?>
            <h1 style="text-align: center;">You havn't any book in shelf yet!</h1>

        <?php } else { ?>

            <table border='1' cellpadding=5 cellspacing=2 id="data">
                <tr>
                    <th class="action-col">Action</th>
                    <th>ISBN</th>
                    <th>Book Title</th>
                    <th>Author </th>
                    <th>Year publication</th>
                    <th>Pulisher</th>
                    <th>Cover</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($results)) { ?>

                    <tr>
                        <td align="center">
                            <form action="" method="post">
                                <input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                                <!-- <a href="#"><input type="button" value="Detail"></a> | -->
                                <input type="submit" value="remove" name="removeBook" class="btn">
                            </form>
                        </td>
                        <td><?php echo $row['ISBN']; ?> </td>
                        <td><?php echo $row['Book-Title']; ?> </td>
                        <td><?php echo $row['Book-Author']; ?> </td>
                        <td><?php echo $row['Year-Publication']; ?> </td>
                        <td><?php echo $row['Publisher']; ?> </td>
                        <td><img src=" <?php echo $row['Image-URL-M']; ?> " alt="book-cover"></td>
                    </tr>

                <?php } ?>

            </table>

        <?php } ?>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-arrow-up"></button>

    <script src="../js/pagination.js"></script>
</body>