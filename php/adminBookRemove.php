<?php
include "dbConnection.php";
session_start();



if(!empty($_SESSION['adminName'])){

    if(isset($_POST['removeBook'])){
        $bookId=$_POST['ISBN'];
        $remove_query="DELETE FROM books 
        WHERE ISBN = '$bookId'";
        if(mysqli_query($connection,$remove_query)){
            echo '<script>alert("Remove sucessfully!")</script>';
        }else{
            echo '<script>alert("Process failed")</script>';
        }
    }

}
?>