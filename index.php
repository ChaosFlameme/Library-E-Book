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
    <link rel="stylesheet" href="css/style.css">

    <?php
    require $_SERVER['DOCUMENT_ROOT'] . "/Library-E-Book/php/login.php";
    include "./php/dbConnection.php";
    include "./php/userBookRenting.php";
    session_start();
    ?>
</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <div class="header-1">

            <a href="#" class="logo"> <i class="fas fa-book"></i> bookly </a>

            <form action="" class="search-form">
                <input type="search" name="" placeholder="search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>

                <!---a href="#" class="fas fa-shopping-cart"></a-->

                <div id="login-btn" class="fas fa-user"></div>

                <?php if (!empty($_SESSION['username'])) {  ?>
                    <!-- <a href="#" class="fas fa-heart"></a> -->
                    <script>
                        document.getElementById("login-btn").style.display = "none";
                    </script>
                    <?php if (!empty($_SESSION['adminName'])) { ?>
                        <a href="../Library-E-Book/php/adminProfile.php" class="fas fa-user-graduate"></a>
                    <?php } else { ?>
                        <a href="../Library-E-Book/php/userprofile.php" class="fas fa-user"></a>
                    <?php } ?>
                    <a href="../Library-E-Book/php/logout.php" class="fas fa-sign-out-alt"></a>
                <?php } ?>
            </div>
            <?php
            if (!empty($_SESSION['username'])) {
            ?>
                <div class="index">
                    <h1>
                        Welcome back <?php echo $_SESSION['username']; ?>
                    </h1>
                </div>
            <?php } ?>

        </div>

        <div class="header-2">
            <nav class="navbar">

                <?php
                if (!empty($_SESSION['adminID'])) {
                ?>
                    <a href="./php/adminProfile.php">home</a>
                    <a href="./php/adminBookListing.php">Book Management</a>
                <?php
                } elseif (!empty($_SESSION['username']) && empty($_SESSION['adminID'])) {
                ?>
                    <a href="./php/userprofile.php">home</a>
                    <a href="./php/userBookListing.php">My bookshelf</a>
                    <a href="./php/userBookBrowsing.php">Browsing Books</a>

                <?php } else { ?>
                    <a href="#">home</a>

                    <a href="./php/bookBrowsing.php">Browse Books</a>
                <?php } ?>
            </nav>
        </div>

    </header>

    <!-- header section ends -->

    <!-- bottom navbar  -->

    <!-- <nav class="bottom-navbar">
        <a href="#home" class="fas fa-home"></a>
        <a href="#featured" class="fas fa-list"></a>
        <a href="#arrivals" class="fas fa-tags"></a>
        <a href="#reviews" class="fas fa-comments"></a>
        <a href="#blogs" class="fas fa-blog"></a>
    </nav> -->

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

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="row">

            <div class="content">
                <h3>Browse our choice</h3>
                <p>
                    We are excited to recommend to our readers our weekly updated books. Each week, our team of librarians and book experts carefully curates a list of potential books and then selects one that we believe will be of particular interest to our members.
                </p>
                <?php
                if (!empty($_SESSION['username'])) {
                ?>
                    <a href="./php/userBookBrowsing.php" class="btn">Browse Now</a>
                <?php } else { ?>
                    <a href="./php/bookBrowsing.php" class="btn">Browse Now</a>
                <?php } ?>

            </div>

            <div class="swiper books-slider">
                <div class="swiper-wrapper">
                    <a href="" class="swiper-slide"><img src="http://images.amazon.com/images/P/0060575808.01.LZZZZZZZ.jpg" alt=""></a>
                    <a href="" class="swiper-slide"><img src="http://images.amazon.com/images/P/0380715899.01.LZZZZZZZ.jpg" alt=""></a>
                    <a href="" class="swiper-slide"><img src="http://images.amazon.com/images/P/0380730448.01.LZZZZZZZ.jpg" alt=""></a>
                </div>
                <img src="image/stand.png" class="stand" alt="">
            </div>

        </div>

    </section>

    <!-- home section ense  -->

    <!-- icons section starts  -->

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-book"></i>
            <div class="content">
                <h3>various choice</h3>
                <p>order over 1000 books</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-lock"></i>
            <div class="content">
                <h3>secure account</h3>
                <p>100 secure account</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-redo-alt"></i>
            <div class="content">
                <h3>easy browsing</h3>
                <p>easy to find</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-headset"></i>
            <div class="content">
                <h3>24/7 support</h3>
                <p>call us anytime</p>
            </div>
        </div>

    </section>

    <!-- icons section ends -->

    <!-- newsletter section starts -->

    <section class="newsletter">

        <form action="">
            <h3>Reading is the key to knowledge</h3>

        </form>

    </section>

    <!-- newsletter section ends -->

    <!-- featured section starts  -->

    <section class="featured" id="featured">

        <h1 class="heading"> <span>featured books</span> </h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <?php
                    $query = "SELECT * FROM books WHERE `ISBN` = '380817144'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div> -->
                    <div class="image">
                        <img src='<?php echo $row["Image-URL-L"] ?>' alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row['Book-Title'] ?></h3>
                        <!-- <div class="price">$15.99 <span>$20.99</span></div> -->
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo $row['ISBN']; ?>">
                            <input type="submit" value="add to shelf" name="rentBook" class="btn">
                            <!-- <a href="#" class="btn">add to shelf</a> -->
                        </form>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <?php
                    $query = "SELECT * FROM books WHERE `ISBN` = '380715899'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div> -->
                    <div class="image">
                        <img src='<?php echo $row["Image-URL-L"] ?>' alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row['Book-Title'] ?></h3>
                        <!-- <div class="price">$15.99 <span>$20.99</span></div> -->
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo $row['ISBN']; ?>">
                            <input type="submit" value="add to shelf" name="rentBook" class="btn">

                        </form>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <?php
                    $query = "SELECT * FROM books WHERE `ISBN` = '380820447'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div> -->
                    <div class="image">
                        <img src='<?php echo $row["Image-URL-L"] ?>' alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row['Book-Title'] ?></h3>
                        <!-- <div class="price">$15.99 <span>$20.99</span></div> -->
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo $row['ISBN']; ?>">
                            <input type="submit" value="add to shelf" name="rentBook" class="btn">

                        </form>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <?php
                    $query = "SELECT * FROM books WHERE `ISBN` = '415928087'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div> -->
                    <div class="image">
                        <img src='<?php echo $row["Image-URL-L"] ?>' alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row['Book-Title'] ?></h3>
                        <!-- <div class="price">$15.99 <span>$20.99</span></div> -->
                        <a href="#" class="btn">add to shelf</a>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <?php
                    $query = "SELECT * FROM books WHERE `ISBN` = '380759497'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div> -->
                    <div class="image">
                        <img src='<?php echo $row["Image-URL-L"] ?>' alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row['Book-Title'] ?></h3>
                        <!-- <div class="price">$15.99 <span>$20.99</span></div> -->
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo $row['ISBN']; ?>">
                            <input type="submit" value="add to shelf" name="rentBook" class="btn">

                        </form>
                    </div>
                </div>

                <div class="swiper-slide box">
                    <?php
                    $query = "SELECT * FROM books WHERE `ISBN` = '038078243X'";
                    $result = mysqli_query($connection, $query);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <!-- <div class="icons">
                        <a href="#" class="fas fa-search"></a>
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                    </div> -->
                    <div class="image">
                        <img src='<?php echo $row["Image-URL-L"] ?>' alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row['Book-Title'] ?></h3>
                        <!-- <div class="price">$15.99 <span>$20.99</span></div> -->
                        <form action="" method="post">
                            <input type="hidden" name="<?php echo $row['ISBN']; ?>">
                            <input type="submit" value="add to shelf" name="rentBook" class="btn">

                        </form>
                    </div>
                </div>






            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- featured section ends -->



    <!-- arrivals section starts  -->
    <!-- 
    <section class="arrivals" id="arrivals">

        <h1 class="heading"> <span>new arrivals</span> </h1>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-1.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-3.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-4.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-5.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-6.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-7.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-8.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-9.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="#" class="swiper-slide box">
                    <div class="image">
                        <img src="image/book-10.png" alt="">
                    </div>
                    <div class="content">
                        <h3>new arrivals</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>

    </section> -->

    <!-- arrivals section ends -->



    <!-- footer section starts  -->

    <section class="footer">


        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>

        <div class="credit"> created by <span>Groupe 6</span> | all rights reserved! </div>

    </section>

    <!-- footer section ends -->

    <!-- loader 

<div class="loader-container">
    <img src="image/loader-img.gif" alt="">
</div>
 -->















    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    <script src="js/login.js"></script>

</body>

</html>