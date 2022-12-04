<?php
include "dbConnection.php";

if (isset($_POST['btnRegister'])) {
    $username = $_POST['txtUsername'];
    $email = $_POST['txtEmail'];
    $password = $_POST['txtPassword']; //Encrypted password

    $sql = "SELECT MAX(uid) AS maxuid FROM users";
    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);
    //$uid = $row['maxuid']+1;
    $uid=51;

    $query = "INSERT INTO users (uid, username, email, password) 
    VALUES ('$uid', '$username','$email','$password')";

    if (mysqli_query($connection, $query)) {
        echo 'Record successfully added!';
        //redirect
        //header ("Location: list.php");
        //redirect with delay
        //header("refresh:2; url=list2.php");
    } else {
        echo 'Error in inserting data. Please try again.';
    }
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
</head>

<body>
    <form action="" method="POST">
        Username: <input type="text" name="txtUsername"><br>
        Email Address: <input type="text" name="txtEmail"><br>
        Password: <input type="password" name="txtPassword" id=""><br>
        <br>
        <input type="submit" value="Register" name="btnRegister">

    </form>
</body>

</html>