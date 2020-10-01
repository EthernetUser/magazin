<?php
session_start();
require('../../php/connection.php');
CheckAvailability();

$subject = trim($_POST['subject']);
$text = trim($_POST['text']);

if(empty($subject) || empty($text)) {
    echo 'empty rows!';
    exit();
    mysqli_close($connection);
}

if(!$query = mysqli_query($connection,"INSERT INTO `news` (`subject`,`text`) VALUES('$subject', '$text')")){
    echo 'query error!';
    mysqli_close($connection);
    exit();
}

mysqli_close($connection);
header('Location: ../index.php');
