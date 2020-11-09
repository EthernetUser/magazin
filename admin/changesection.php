<?php
session_start();
require('../php/connection.php');
    require('../php/adminfuncs.php');
CheckAvailability();
$id = $_GET['id'];
if(!isset($id) || empty($id)){
    echo 'wrong get request!';
    mysqli_close($connection);
    exit();
}
if(!$query = mysqli_query($connection,"SELECT * FROM `sections_ru` WHERE `id` = '$id'")) {
    echo 'query error!';
    var_dump($query);
    mysqli_close($connection);
    exit();
}
if(!$query_en = mysqli_query($connection,"SELECT * FROM `sections_en` WHERE `id` = '$id'")) {
    echo 'query error!';
    var_dump($query_en);
    mysqli_close($connection);
    exit();
}
$section = mysqli_fetch_assoc($query);
$section_en = mysqli_fetch_assoc($query_en);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="adminwrapper">
        <? require('components/header.php');?>

        <? require('components/navigation.php');?>

        <main class="main">
            <div class="main__container">
                <div class="main__header">
                    <h1 class="main__subject subject">Изменить раздел <?=$section['name']?>, id = <?=$section['id']?></h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/changesection-script.php" method="post" class="addgoods__form" enctype="multipart/form-data">
                        <label for="" class="addgoods__label">Название:</label>
                        <input type="text" name="name" class="addgoods__text" value="<?=$section['name']?>" required>

                        <label for="" class="addgoods__label">Название (Английский):</label>
                        <input type="text" name="name_en" class="addgoods__text" value="<?=$section_en['name']?>" required>

                        <label for="" class="addgoods__label">Кол-во записей выводимое на странице:</label>
                        <input type="number" name="countNotes" class="addgoods__text" value="<?=$section_en['countNotes']?>" required>

                        <input type="hidden" name="id" id="id" value="<?=$section['id']?>">
                        <div>
                            <input type="submit" value="Изменить" class="addgoods__button">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="js/deletegoods.js"></script>
</body>

</html>
<?php
    mysqli_close($connection);
?>