<?php
session_start();
require('../../php/connection.php');
CheckAvailability();

$id = $_GET['id'];

if(!isset($id) || empty($id)){
    echo 'wrong get request!';
    mysqli_close($connection);
    exit();
}

if(!$query = mysqli_query($connection, "SELECT `img-path` FROM `goods` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

$path = mysqli_fetch_assoc($query);

unlink('../../' . $path['img-path']);

if(!$query = mysqli_query($connection, "DELETE FROM `goods` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

header('Location: ../index.php');