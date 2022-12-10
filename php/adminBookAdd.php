<?php
include "dbConnection.php";

if (isset($_POST['addBook'])) {
    $ISBN = $_POST[''];
    $bookTitle = $_POST[''];
    $author = $_POST[''];
    $yearPublication = $_POST[''];
    $publisher=$_POST[''];
    $cover_s = $_POST[''];
    $cover_m = $_POST[''];
    $cover_l = $_POST[''];


    $errors = array();

    //Validation
    if (empty($ISBN)) {
        array_push($errors, "ISBN is required");
    }
    if (empty($bookTitle)) {
        array_push($errors, "Email is required");
    }
    if (empty($author)) {
        array_push($errors, "Password is required");
    }


    $ISBN_check_query = "SELECT * FROM books where ISBN = '$ISBN' LIMIT 1";
    $result = mysqli_query($connection, $ISBN_check_query);
    $existBook = mysqli_fetch_assoc($result);
    if ($existBook) {
        if ($existBook['ISBN'] === $ISBN) {
            array_push($errors, "Book already added");
        }
    }

    //Check if there's no error
    if (count($errors) == 0) {

        $query = "INSERT INTO books 
    VALUES ('$ISBN', '$bookTitle','$author','$yearPublication','$publisher', '$cover_s', '$cover_m', '$cover_l')";

        if (mysqli_query($connection, $query)) {
            echo '<script>alert("Register sucessfully!")</script>';
            
        } else {
            echo '<script>alert("Register Failed!")</script>';
        }
    }
}

mysqli_close($connection);
?>


<html>
<body>
    <div class="login-form-container register-form-container">
        <form action="" method="POST">
            <h3>register</h3>
            <span>username</span>
            <input type="text" name="txtUsername" class="box" placeholder="enter your username" id="txtUsername" required>

            <span>email</span>
            <input type="email" name="txtEmail" class="box" placeholder="enter your email" id="txtEmail " required>

            <span>password</span>
            <input type="password" name="txtPassword" class="box" placeholder="enter your password" id="txtPassword" required>

            <span>confirm your password</span>
            <input type="password" name="txtPassword" class="box" placeholder="re-enter your password" id="txtPasswordCon" required>
            <div class="checkbox">
                <input required type="checkbox" name="" id="agree-terms">
                <label for="agree-terms">I agree with
                    <a href="#">the terms of services</a></label>
            </div>
            <input type="submit" value="register" name="register" class="btn">
            <p>Already have an account ? <a href="../index.php">Back to main page</a></p>
        </form>
    </div>
</body>

</html>