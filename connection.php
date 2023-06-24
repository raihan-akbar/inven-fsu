<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "inven";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Connection to DB Failed [FAIL]");
}else{
    echo "Connection to DB Success [OK]";
}

?>
