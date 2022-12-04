<?php

    $host = 'localhost'; // OR 127.0.0.1
    $username = 'root';
    $password = 'root';
    $database ='e_library'; // name database  //use db for espace !!!
    $connection = mysqli_connect($host,$username,$password,$database); // create a connection to the database but we have to pass to a variable 
    
    if($connection == false)
    {
        die('Error in connection' . mysqli_connect_error());
    }else{
        
    }

?>
