<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'magazin_shop');

function CheckAvailability(){
    if (!$_SESSION['id'] || !$_SESSION['role']) {
        header('Location: login.php');
    }
}

function CheckRole(string $role, string $pathBack = 'login.php') {
    if($_SESSION['role'] !== $role){
        header("Location: $pathBack");
    }
}