<?php

include "dbConnection.php";
session_start();

if (isset($_POST['removeBook'])) {

    $bookId = $_POST['ISBN'];
    $userId = $_SESSION['uid'];
    
    if (!empty($_SESSION['username'])) {

        $remove_query = "DELETE FROM `usersbookshelf` 
        WHERE ISBN = '$bookId' AND userID = '$userId' ";
        if (mysqli_query($connection, $remove_query)) {
            echo '<script>alert("Remove sucessfully!")</script>';
        } else {
            echo '<script>alert("Process failed")</script>';
        }
    } else {
        echo '<script>alert("You need to login first!")</script>';
    }
}
