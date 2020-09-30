<?php
session_start();
require('../../php/connection.php');

$email = trim($_POST['email']);
$name = trim($_POST['name']);
$pass = trim($_POST['pass']);
$role = trim($_POST['role']);

if($query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'")){
    while($user = mysqli_fetch_assoc($query)){
        if($user['email'] === $email){
            echo 'email is already used!';
            exit();
        }
    }

    $password = password_hash($pass, PASSWORD_DEFAULT);

    $query = mysqli_query($connection, "INSERT INTO `users` (`email`, `name`, `password`, `role`) VALUES('$email','$name','$password','$role')");
    header('Location: ../index.php');
} else {
    echo 'query error!';
}
