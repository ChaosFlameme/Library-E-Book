<?php

include "dbConnection.php";
session_start();

$bookId;
$userId;

if(!empty($_SESSION['username'])){
    $already_rent_check_q = 
    "SELECT * FROM usersbookshelf where ISBN = '$bookId' AND userID='$userId'";
    $check_result=mysqli_query($connection,$already_rent_check_q);
    $count = mysqli_fetch_row($check_result);
    if(!$count){
        $rent_query="INSERT INTO usersbookshelf (ISBN, userID) 
        VALUES ('$bookId', '$userId')";
        if(mysqli_query($connection,$rent_query)){
            echo '<script>alert("Rent sucessfully!")</script>';
        }else{
            echo '<script>alert("Process failed")</script>';
        }
    }
}else{
    echo '<script>alert("You need to login first!")</script>';
}




?>