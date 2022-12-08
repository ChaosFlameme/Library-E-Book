<?php
session_start();
session_destroy();

header("Location: /Library-E-Book/index.php");

?>