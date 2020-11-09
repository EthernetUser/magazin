<?php

// функция проверки id и role пользователя
function CheckAvailability(){
    if (!$_SESSION['id'] || !$_SESSION['role']) {
        header('Location: login.php');
    }
}

// проверка role пользователя 
function CheckRole(string $role, string $pathBack = 'login.php') {
    if($_SESSION['role'] !== $role){
        header("Location: $pathBack");
    }
}