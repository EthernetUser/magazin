<?php
session_start();
require('../../php/connection.php');

$email = trim($_POST['email']);
$password = trim($_POST['pass']);

if($query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'")){
    if($query->num_rows !== null && $query->num_rows !== 0) {
        while($user = mysqli_fetch_assoc($query)){
            if(password_verify($password,$user['password'])){
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: ../index.php');
            } else {
                echo 'wrong data 1';
            }
        }
    }else{
        echo 'wrong data';
    }
} else {
    echo 'query error!';
}
