<?php
include "dbConnection.php";
include "adminBookEdit.php";
include "adminBookAdd.php";
include "adminBookRemove.php";

session_start();

$uid = $_SESSION['uid'];

//SELECT * FROM `books` ORDER BY `books`.`ISBN` DESC
$query = "SELECT * FROM `books`";

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


            <h1 class="sub-header">Book Management</h1>

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


    <div class="listing-search-bar">
        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>

    <div class="add-book">
        <form action="" method="POST">
            <h3>Add book</h3>
            <!-- <label for="addISBN">ISBN</label> -->
            <input type="text" name="addISBN" id="addISBN" class="box" placeholder="enter ISBN" required>

            <!-- <label for="addBookTitle">Book Title</label> -->
            <input type="text" name="addBookTitle" id="addBookTitle" class="box" placeholder="enter book title" required>

            <!-- <label for="addAuthor">Author</label> -->
            <input type="text" name="addAuthor" id="addAuthor" class="box" placeholder="enter author" required>

            <!-- <label for="addYear">Year</label> -->
            <input type="text" name="addYear" id="addYear" class="box" placeholder="enter year" required>

            <!-- <label for="addPublisher">Publisher</label> -->
            <input type="text" name="addPublisher" id="addPublisher" class="box" placeholder="enter publisher" required>

            <!-- <label for="addPublisher">Cover</label> -->
            <input type="text" name="addImageL" id="addImageL" class="box" placeholder="enter image url">


            <input type="submit" value="AddBook" name="addBook" class="btn">

        </form>
    </div>

    <div class="book-list">
        <table border='1' cellpadding=5 cellspacing=2 id="data">
            <thead>
                <tr>
                    <th class="action-col">Action</th>
                    <th>ISBN </th>
                    <th>Book Title</th>
                    <th>Author </th>
                    <th>Year publication</th>
                    <th>Pulisher</th>
                    <th>Cover</th>
                </tr>
            </thead>

            <?php while ($row = mysqli_fetch_assoc($results)) { ?>

                <tr>
                    <td align="center">
                        <form action="" method="post">
                            <input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                            <input type="submit" value="remove" name="removeBook" class="btn">
                        </form>
                    </td>
                    <td><?php echo $row['ISBN']; ?> </td>
                    <td><?php echo $row['Book-Title']; ?> </td>
                    <td><?php echo $row['Book-Author']; ?> </td>
                    <td><?php echo $row['Year-Publication']; ?> </td>
                    <td><?php echo $row['Publisher']; ?> </td>
                    <td><img src=" <?php echo $row['Image-URL-L']; ?> " alt="book-cover"></td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top" class="fas fa-arrow-up"></button>

    <script src="../js/pagination.js"></script>
</body>