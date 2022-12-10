<?php
include "dbConnection.php";

if (isset($_POST['addBook'])) {
    $ISBN = $_POST['addISBN'];
    $bookTitle = $_POST['addBookTitle'];
    $author = $_POST['addAuthor'];
    $yearPublication = $_POST['addYear'];
    $publisher=$_POST['addPublisher'];
    // $cover_s = $_POST['addImageS'];
    // $cover_m = $_POST['addImageM'];
    $cover_l = $_POST['addImageL'];
    $noImage = "https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png";
    
    $errors = array();

    if(empty($cover_l)){

        $cover_l=$noImage;
    }

    //Validation
    if (empty($ISBN)) {
        array_push($errors, "ISBN is required");
    }
    if (empty($bookTitle)) {
        array_push($errors, "book title is required");
    }
    if (empty($author)) {
        array_push($errors, "Author is required");
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
        echo $ISBN . "|";
        echo $bookTitle. "|";
        echo $author. "|";
        echo $yearPublication. "|";
        echo $publisher. "|";
        echo $cover_l;

        $query = "INSERT INTO `books` (`ISBN`, `Book-Title`, `Book-Author`, `Year-Publication`, `Publisher`, `Image-URL-L`)
    VALUES ('$ISBN', '$bookTitle','$author','$yearPublication','$publisher', '$cover_l')";

        if (mysqli_query($connection, $query)) {
            echo '<script>alert("Book added sucessfully!")</script>';
            
        } else {
            echo '<script>alert("Adding Failed!")</script>';
        }
    }else{
        foreach($errors as $error) {
            echo $error, '<br>';
        }
    }
}

mysqli_close($connection);

//https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png
?>


<html>
<body>
        <form action="" method="POST">
            <h3>Add book</h3>
            <label for="addISBN">ISBN</label>
            <input type="text" name="addISBN"  id="addISBN" class="box" placeholder="enter ISBN" required>
            
            <label for="addBookTitle">Book Title</label>
            <input type="text" name="addBookTitle"  id="addBookTitle" class="box" placeholder="enter book title" required>
            
            <label for="addAuthor">Author</label>
            <input type="text" name="addAuthor"  id="addAuthor" class="box" placeholder="enter author" required>
            
            <label for="addYear">Year</label>
            <input type="text" name="addYear"  id="addYear" class="box" placeholder="enter year" required>
            
            <label for="addPublisher">Publisher</label>
            <input type="text" name="addPublisher"  id="addPublisher" class="box" placeholder="enter publisher" required>
            
            <label for="addPublisher">Cover</label>
            <input type="text" name="addImageL"  id="addImageL" class="box" placeholder="enter image url">
            

            <input type="submit" value="AddBook" name="addBook" class="btn">
            
        </form>
</body>

</html>