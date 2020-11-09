<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');

$email = trim($_POST['email']);
$password = trim($_POST['pass']);

// проверка пустоты строк
if(empty($email) || empty($password)) {
    echo 'empty rows!';
    mysqli_close($connection);
    exit();
}

if($query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'")){
    
    // провека существования аккаунта в бд
    if($query->num_rows !== null && $query->num_rows !== 0) {
        while($user = mysqli_fetch_assoc($query)){

            // проверка пароля
            if(password_verify($password,$user['password'])){
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                mysqli_close($connection);
                header('Location: ../index.php');
            } else {
                echo 'wrong data 1';
                mysqli_close($connection);
            }
        }
    }else{
        echo 'wrong data';
        mysqli_close($connection);
    }
} else {
    echo 'query error!';
    mysqli_close($connection);
}

mysqli_close($connection);
