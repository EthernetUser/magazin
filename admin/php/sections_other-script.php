<?php
session_start();
require('../../php/connection.php');
    require('../../php/adminfuncs.php');
CheckAvailability();

$texts = [$_POST['read'], $_POST['go'], $_POST['price'], $_POST['rub'], $_POST['header'], $_POST['date']];
$texts_en = [$_POST['read_en'], $_POST['go_en'], $_POST['price_en'], $_POST['rub_en'], $_POST['header_en'], $_POST['date_en']];

for($i = 0; $i < count($texts); $i++){
    if(empty($texts[$i])){
        echo 'empty row!';
        mysqli_close($connection);
        exit();
    }
    if(empty($texts_en[$i])){
        echo 'empty row!';
        mysqli_close($connection);
        exit();
    }
}

for($i = 1; $i <= count($texts); $i++){
    $j = $i - 1;
    if(!$query = mysqli_query($connection, "UPDATE sections_other_ru SET `text` = '$texts[$j]' WHERE '$i' = `id`")){
        echo 'query error';
        mysqli_close($connection);
        exit();
    }
    if(!$query = mysqli_query($connection, "UPDATE sections_other_en SET `text` = '$texts_en[$j]' WHERE '$i' = `id`")){
        echo 'query error';
        mysqli_close($connection);
        exit();
    }
}

mysqli_close($connection);
header('Location: ../index.php');