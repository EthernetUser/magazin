<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
CheckAvailability();

$id = $_POST['id'];
$name = trim($_POST['name']);
$name_en = trim($_POST['name_en']);
$countNotes = trim($_POST['countNotes']);



if(empty($id) || empty($name) || empty($name_en) || empty($countNotes)) {
    echo 'empty rows! ';
    mysqli_close($connection);
    exit();
}


// обновление данных в бд
if(!$query = mysqli_query($connection,"UPDATE `sections_ru` SET `name` = '$name', `countNotes` = '$countNotes' WHERE `id` = '$id'")){
    echo 'query error!';
    die(mysqli_error($connection));
}
if(!$query = mysqli_query($connection,"UPDATE `sections_en` SET `name` = '$name_en', `countNotes` = '$countNotes' WHERE `id` = '$id'")){
    echo 'query error!';
    die(mysqli_error($connection));
}


mysqli_close($connection);
header('Location: ../sections.php');
