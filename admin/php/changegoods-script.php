<?php
session_start();
require('../../php/connection.php');
CheckAvailability();

$name = trim($_POST['name']);
$img = $_FILES['img'];
$description = trim($_POST['description']);
$price = trim($_POST['price']);
$id = trim($_POST['id']);

if(empty($name) || empty($description) || empty($price) || empty($id)) {
    echo 'empty rows! ';
    mysqli_close($connection);
    exit();
}

// поддерживаемые типы файла
$types = array('image/jpeg', 'image/png', 'image/jpg');

// максимальный размер файла в байтах
$size = 1024000;

// проверка типа файла
if(!in_array($img['type'], $types) && $img['type'] !== ""){
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

if(!$query = mysqli_query($connection,"UPDATE `goods` SET `name` = '$name', `description` = '$description', `price` = '$price' WHERE `id` = '$id'")){
    echo 'query error!';
    mysqli_close($connection);
    exit();
}

if($img['error'] === 0) {
    $query = mysqli_query($connection,"SELECT `img-path` FROM `goods` WHERE `id` = '$id'");
    $oldPath = mysqli_fetch_assoc($query);

    unlink('../../' . $oldPath['img-path']);

    if(!$query = mysqli_query($connection,"UPDATE `goods` SET `img-path` = '$path' WHERE `id` = '$id'")){
        echo 'query error!';
        mysqli_close($connection);
        exit();
    }

    copy($img['tmp_name'], '../../' . $path);

    mysqli_close($connection);
    header('Location: ../index.php');
}


mysqli_close($connection);
header('Location: ../index.php');
