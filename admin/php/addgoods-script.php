<?php
session_start();
require('../../php/connection.php');
CheckAvailability();

$name = trim($_POST['name']);
$img = $_FILES['img'];
$desc = trim($_POST['description']);
$price = trim($_POST['price']);

// поддерживаемые типы файла
$types = array('image/jpeg', 'image/png', 'image/jpg');

// максимальный размер файла в байтах
$size = 1024000;

// проверка типа файла
if(!in_array($img['type'], $types)){
    echo 'wrong type of file! ' . $img['type'];
    mysqli_close($connection);
    exit();
}

// проверка размера файла в байтах
if($img['size'] > $size) {
    echo 'file is too large!';
    mysqli_close($connection);
    exit();
}

$path = 'img/goods/' . date('dmYHis') . $img['name'];

if(!$query = mysqli_query($connection, "INSERT INTO `goods` (`name`,`description`,`price`,`img-path`) VALUES('$name', '$desc','$price', '$path')")){
    echo 'query error!';
    mysqli_close($connection);
    exit();
}

copy($img['tmp_name'], '../../' . $path);

mysqli_close($connection);
header('Location: ../index.php');
