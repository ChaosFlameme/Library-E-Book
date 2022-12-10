<?php
include "dbConnection.php";
include "userBookRenting.php";

session_start();

$uid = $_SESSION['uid'];
echo $uid;

$query = "SELECT * FROM books";

$results = mysqli_query($connection, $query);

mysqli_close($connection);
?>
<style>
    img{
        width: 100px;
    }
</style>


<html>
<h1 align=center>Book list</h1>
<table border='1' cellpadding=5 cellspacing=2>
    <tr>
        <th>Action</th>
        <th>ISBN</th>
        <th>Book Title</th>
        <th>Author </th>
        <th>Year publication</th>
        <th>Pulisher</th>
        <th>Cover</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($results)) { ?>

        <tr>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                    <input type="submit" value="add to shelf" name="rentBook">
                </form>
            </td>
            <td><?php echo $row['ISBN']; ?> </td>
            <td><?php echo $row['Book-Title']; ?> </td>
            <td><?php echo $row['Book-Author']; ?> </td>
            <td><?php echo $row['Year-Publication']; ?> </td>
            <td><?php echo $row['Publisher']; ?> </td>
            <td><img src=" <?php echo $row['Image-URL-L']; ?> " alt="book-cover"></td>
        </tr>

    <?php } ?>
    
</table>

</html>