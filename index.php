<?php
     if (!isset($_SESSION['status'])) {
         header("location:signin.php?con=!login");
     }
else if (isset($_SESSION['status'])) {
        if ($_SESSION['role'] == 'Admin') {
            header("location:dashboard.php");
        }
   else if ($_SESSION['role'] == 'Staff') {
            header("location:staff.php");
        }else{
         header("location:signin.php?con=!login");

        }
     }
?>