<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
CheckAvailability();

$name = trim($_POST['name']);
$img = $_FILES['img'];
$description = trim($_POST['description']);
$price = trim($_POST['price']);
$id = trim($_POST['id']);

$name_en = trim($_POST['name_en']);
$description_en = trim($_POST['description_en']);

// поддерживаемые типы файла
$types = array('image/jpeg', 'image/png', 'image/jpg');

// максимальный размер файла в байтах
$size = 1024000;

if(empty($name) || empty($description) || empty($price) || empty($id) || empty($name_en) || empty($description_en)) {
    echo 'empty rows! ';
    mysqli_close($connection);
    exit();
}

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

// обновление данных в бд
if(!$query = mysqli_query($connection,"UPDATE `goods_ru` SET `name` = '$name', `description` = '$description', `price` = '$price' WHERE `id` = '$id'")){
    echo 'query error!';
    mysqli_close($connection);
    exit();
}

if(!$query = mysqli_query($connection,"UPDATE `goods_en` SET `name` = '$name_en', `description` = '$description_en', `price` = '$price' WHERE `id` = '$id'")){
    echo 'query error!';
    mysqli_close($connection);
    exit();
}

// проверка успешность загрузки файла во временный файл
if($img['error'] === 0) {

    // получение пути к старому файлу
    $query = mysqli_query($connection,"SELECT `img-path` FROM `goods_ru` WHERE `id` = '$id'");
    $oldPath = mysqli_fetch_assoc($query);

    // удаление старого файла
    unlink('../../' . $oldPath['img-path']);

    // внесение пути к новому файлу
    if(!$query = mysqli_query($connection,"UPDATE `goods_ru` SET `img-path` = '$path' WHERE `id` = '$id'")){
        echo 'query error!';
        mysqli_close($connection);
        exit();
    }

    if(!$query = mysqli_query($connection,"UPDATE `goods_en` SET `img-path` = '$path' WHERE `id` = '$id'")){
        echo 'query error!';
        mysqli_close($connection);
        exit();
    }

    // загрузка нового файла на сервер
    copy($img['tmp_name'], '../../' . $path);

    mysqli_close($connection);
    header('Location: ../goods.php');
}


mysqli_close($connection);
header('Location: ../goods.php');
