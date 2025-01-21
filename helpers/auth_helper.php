<?php

function requireAuth() {
    if (!isset($_SESSION['user'])) {
       header('location: ../views/login.php');
       exit();
    }
}


function requireGuest() {
    if (isset($_SESSION['user'])) {
       header('location: ../views/dashboard.php');
       exit();
    }
}