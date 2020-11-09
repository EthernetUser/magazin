<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
CheckAvailability();

$id = $_GET['id'];

if(!isset($id) || empty($id)){
    echo 'wrong get request!';
    mysqli_close($connection);
    exit();
}


// удаление новости из бд
if(!$query = mysqli_query($connection, "DELETE FROM `news_ru` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

if(!$query = mysqli_query($connection, "DELETE FROM `news_en` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}
header('Location: ../news.php');