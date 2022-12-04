<?php

include "dbConnection.php";

$username = "hello";
$email = "gg@gmail.com";
$password = md5("1234"); //Encrypted password
$sql = "SELECT MAX(uid) AS maxuid FROM users";
$result = $connection->query($sql);
$row = mysqli_fetch_assoc($result);
$uid = $row['maxuid'];

$query = "INSERT INTO users (uid, username, email, password) 
VALUES ('$uid', '$username','$email','$password')";

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";


if (mysqli_query($connection, $query)) {
    echo 'Record successfully added!';
    //redirect
    //header ("Location: list.php");
    //redirect with delay
    //header("refresh:2; url=list2.php");
} else {
    echo 'Error in inserting data. Please try again.';
}
$connection->close();
?>