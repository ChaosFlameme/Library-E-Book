<?php
session_start();


//Detect duplicated rows
//"DELETE FROM usersbookshelf WHERE userID NOT IN (SELECT * FROM (SELECT MAX( userID) FROM usersbookshelf GROUP BY ISBN) AS uback);"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oyasumi</title>
</head>
<body>
    <h1>oyasumi</h1>
</body>
</html>