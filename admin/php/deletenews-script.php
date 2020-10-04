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


// удаление новости из бд
if(!$query = mysqli_query($connection, "DELETE FROM `news` WHERE `id` = '$id'")) {
    echo 'query error';
    mysqli_close($connection);
    exit();
}

header('Location: ../index.php');