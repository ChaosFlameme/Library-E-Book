<?php
include "dbConnection.php";


if(isset($_POST['editTitle'])){
    $ISBN = $_POST['ISBN'];
    $newElement=$_POST['newTitle'];
    if(!empty($newElement)){
        $query="UPDATE `books` SET `Book-Title` = '$newElement' where `ISBN` = '$ISBN' ";
        if(!mysqli_query($connection, $query)){
            echo '<script>alert("Update Failed!")</script>';
        }
    }
}

if(isset($_POST['editAuthor'])){
    $ISBN = $_POST['ISBN'];
    $newElement=$_POST['newAuthor'];
    if(!empty($newElement)){
        $query="UPDATE `books` SET `Book-Author` = '$newElement' where `ISBN` = '$ISBN' ";
        if(!mysqli_query($connection, $query)){
            echo '<script>alert("Update Failed!")</script>';
        }
    }
}

if(isset($_POST['editYear'])){
    $ISBN = $_POST['ISBN'];
    $newElement=$_POST['newYear'];
    if(!empty($newElement)){
        $query="UPDATE `books` SET `Year-Publication` = '$newElement' where `ISBN` = '$ISBN' ";
        if(!mysqli_query($connection, $query)){
            echo '<script>alert("Update Failed!")</script>';
        }
    }
}

if(isset($_POST['editPublisher'])){
    $ISBN = $_POST['ISBN'];
    $newElement=$_POST['newPublisher'];
    if(!empty($newElement)){
        $query="UPDATE `books` SET `Publisher` = '$newElement' where `ISBN` = '$ISBN' ";
        if(!mysqli_query($connection, $query)){
            echo '<script>alert("Update Failed!")</script>';
        }
    }
}

if(isset($_POST['editCover'])){
    $ISBN = $_POST['ISBN'];
    $newElement=$_POST['newCover'];
    if(!empty($newElement)){
        $query="UPDATE `books` SET `Image-URL-L` = '$newElement' where `ISBN` = '$ISBN' ";
        if(!mysqli_query($connection, $query)){
            echo '<script>alert("Update Failed!")</script>';
        }
    }
}

?>