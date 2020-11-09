<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
CheckAvailability();

$id = $_POST['id'];
$subject = trim($_POST['subject']);
$text = trim($_POST['text']);

$subject_en = trim($_POST['subject_en']);
$text_en = trim($_POST['text_en']);



if(empty($subject) || empty($text) || empty($subject_en) || empty($text_en)) {
    echo 'empty rows! ';
    mysqli_close($connection);
    exit();
}


// обновление данных в бд
if(!$query = mysqli_query($connection,"UPDATE `articles_ru` SET `subject` = '$subject', `text` = '$text' WHERE `id` = '$id'")){
    echo 'query error!';
    die(mysqli_error($connection));
}

if(!$query = mysqli_query($connection,"UPDATE `articles_en` SET `subject` = '$subject_en', `text` = '$text_en' WHERE `id` = '$id'")){
    echo 'query error!';
    die(mysqli_error($connection));
}

mysqli_close($connection);
header('Location: ../articles.php');
