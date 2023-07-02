<?php 
include 'config.php';

$username = $_POST['username'] ? $_POST['username'] : '';

$sql = "SELECT COUNT(*) AS countUsr FROM user WHERE username = '$username'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$count = $row['countUsr'];

echo $count;
?>