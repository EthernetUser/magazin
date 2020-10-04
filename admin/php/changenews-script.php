<?php
session_start();
require('../../php/connection.php');
CheckAvailability();

$id = $_POST['id'];
$subject = trim($_POST['subject']);
$text = trim($_POST['text']);



if(empty($subject) || empty($text)) {
    echo 'empty rows! ';
    mysqli_close($connection);
    exit();
}


// обновление данных в бд
if(!$query = mysqli_query($connection,"UPDATE `news` SET `subject` = '$subject', `text` = '$text' WHERE `id` = '$id'")){
    echo 'query error!';
    die(mysqli_error($connection));
}


mysqli_close($connection);
header('Location: ../index.php');
