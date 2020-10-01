<?php
session_start();
require('../../php/connection.php');
CheckAvailability();
CheckRole('admin', '../index.php');

$email = trim($_POST['email']);
$name = trim($_POST['name']);
$pass = trim($_POST['pass']);
$role = trim($_POST['role']);

// проверка пустоты строк
if(empty($email) || empty($name) || empty($pass) || empty($role)) {
    echo 'empty rows!';
    mysqli_close($connection);
    exit();
}

// проверка на уникальность email
if($query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'")){
    while($user = mysqli_fetch_assoc($query)){
        if($user['email'] === $email){
            echo 'email is already used!';
            mysqli_close($connection);
            exit();
        }
    }

    // хеширование пароля
    $password = password_hash($pass, PASSWORD_DEFAULT);

    // внесение аккаунта в бд
    $query = mysqli_query($connection, "INSERT INTO `users` (`email`, `name`, `password`, `role`) VALUES('$email','$name','$password','$role')");
    mysqli_close($connection);
    header('Location: ../index.php');
} else {
    // ошибка запроса
    echo 'query error!';
    mysqli_close($connection);
}
