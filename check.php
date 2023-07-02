<?php
include 'config.php';
 
error_reporting(0);
session_start();
 
if (!isset($_SESSION['status'])) {
    header("Location: signin.php?con=!login");
}
date_default_timezone_set("Asia/Jakarta");
?>