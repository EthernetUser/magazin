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

// получение пути к файлу
if(!$query = mysqli_query($connection, "SELECT `img-path` FROM `goods_ru` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

$path = mysqli_fetch_assoc($query);

// удаление файла
unlink('../../' . $path['img-path']);

// удаление товара из бд
if(!$query = mysqli_query($connection, "DELETE FROM `goods_ru` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

if(!$query = mysqli_query($connection, "DELETE FROM `goods_en` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

header('Location: ../goods.php');