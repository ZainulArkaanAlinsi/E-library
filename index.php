<?php
session_start();

if  (isset ($_SESSION['user'])) {
    header('location: views/dashboard.php');
    exit();
}

header('Location: views/login.php');
exit();

?>