<?php
include "dbConnection.php";
session_start();

$uid = $_SESSION['uid'];


$query = "SELECT * FROM books";

$results = mysqli_query($connection, $query);

mysqli_close($connection);
?>

<html>
<h1 align=center>Book list</h1>
<table border='1' cellpadding=5 cellspacing=2>
    <tr>
        <th>ISBN</th>
        <th>Book Title</th>
        <th>Author </th>
        <th>Year publication</th>
        <th>Pulisher</th>
        <th>Cover</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($results)) { ?>

        <tr>
            <td><?php echo $row['ISBN']; ?> </td>
            <td><?php echo $row['Book-Title']; ?> </td>
            <td><?php echo $row['Book-Author']; ?> </td>
            <td><?php echo $row['Year-Publication']; ?> </td>
            <td><?php echo $row['Publisher']; ?> </td>
            <td><img src=" <?php echo $row['Image-URL-M']; ?> " alt="book-cover"></td>
        </tr>

    <?php } ?>
    
</table>

</html>