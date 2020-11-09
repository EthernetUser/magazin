<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
CheckAvailability();

$subject = trim($_POST['subject']);
$text = trim($_POST['text']);

$subject_en = trim($_POST['subject_en']);
$text_en = trim($_POST['text_en']);

if(empty($subject) || empty($text) ||  empty($subject_en) || empty($text_en)) {
    echo 'empty rows! ';
    exit();
    mysqli_close($connection);
}
$date = date("Y-m-d H:i:s"); 

if(!$query = mysqli_query($connection,"INSERT INTO `news_ru` (`subject`,`text`,`date`) VALUES('$subject', '$text', '$date')")){
    echo 'query error ru!';
    mysqli_close($connection);
    exit();
}

if(!$query = mysqli_query($connection,"INSERT INTO `news_en` (`subject`,`text`,`date`) VALUES('$subject_en', '$text_en', '$date')")){
    echo 'query error en!';
    mysqli_close($connection);
    exit();
}

mysqli_close($connection);
header('Location: ../news.php');
