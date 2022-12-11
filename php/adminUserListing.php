<?php
include "dbConnection.php";
session_start();

$uid = $_SESSION['uid'];


$query = "SELECT * FROM users";

$results = mysqli_query($connection, $query);

?>

<html>
<h1 align=center>User list</h1>
<table border='1' cellpadding=5 cellspacing=2 align="center">
    <tr>
        <th>UID</th>
        <th>Username</th>
        <th>Email </th>
        <th>Password</th>
       
    </tr>

    <?php while ($row = mysqli_fetch_assoc($results)) { ?>

        <tr>
            <td><?php echo $row['uid']; ?> </td>
            <td><?php echo $row['username']; ?> </td>
            <td><?php echo $row['email']; ?> </td>
            <td><?php echo $row['password']; ?> </td>
        </tr>

    <?php } ?>
    
</table>

</html>