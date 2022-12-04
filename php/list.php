<?php

    include 'dbConnection.php';
    // step2 create a query - SELECT
    $query =  "SELECT * FROM users ORDER BY uid DESC";
    // execute the query 
    $results = mysqli_query($connection,$query); // database + query 
    //display 
    echo "
    <h1 align=center>Student List </h1>
    <table border= '1' cellpadding=5 cellspacing=2>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name </th>
        <th>Email Adress</th>
        <th> Country </th>
    </tr>";
    
    while($row = mysqli_fetch_assoc($results))
    {
        //echo $row['ID']."\t\t".$row['firstname']."\t\t". $row['lastname']. '<br>';
        echo '<tr>';
        echo '<td>'. $row['uid']. '</td>';
        echo '<td>'. $row['username']. '</td>';
        echo '<td>'. $row['email']. '</td>';
        
        echo '</tr>';
    }

    echo '</table>';
     
    ?>