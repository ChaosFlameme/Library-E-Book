<?php
include "dbConnection.php";
session_start();

$bookId;

if(!empty($_SESSION['adminName'])){
    $remove_query="DELETE FROM books 
    WHERE ISBN = '$bookId'";
    if(mysqli_query($connection,$remove_query)){
        echo '<script>alert("Remove sucessfully!")</script>';
    }else{
        echo '<script>alert("Process failed")</script>';
    }
}
?>