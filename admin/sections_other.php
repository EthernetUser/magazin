<?php
session_start();
require('../php/connection.php');
    require('../php/adminfuncs.php');
CheckAvailability();

if(!$query = mysqli_query($connection,"SELECT * FROM `sections_other_ru`")) {
    echo 'query error!';
    var_dump($query);
    mysqli_close($connection);
    exit();
}
if(!$query_en = mysqli_query($connection,"SELECT * FROM `sections_other_en`")) {
    echo 'query error!';
    var_dump($query_en);
    mysqli_close($connection);
    exit();
}
$section = mysqli_fetch_all($query);
$section_en = mysqli_fetch_all($query_en);
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
                    <h1 class="main__subject subject">Управление разделами (Дополнительно)</h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/sections_other-script.php" method="post" class="addgoods__form" enctype="multipart/form-data">
                        <label for="" class="addgoods__label">Текст кнопок на боковой панели (Читать далее):</label>
                        <div>
                            Русский: <input type="text" name="read" class="addgoods__text" value="<?=$section[0][1]?>" required>
                            Английский: <input type="text" name="read_en" class="addgoods__text" value="<?=$section_en[0][1]?>" required>
                        </div>
                        <label for="" class="addgoods__label">Текст кнопок главного раздела (Перейти в раздел):</label>
                        <div>
                            Русский: <input type="text" name="go" class="addgoods__text" value="<?=$section[1][1]?>" required>
                            Английский: <input type="text" name="go_en" class="addgoods__text" value="<?=$section_en[1][1]?>" required>
                        </div>
                        <label for="" class="addgoods__label">Текст перед ценной товара (Цена):</label>
                        <div>
                            Русский: <input type="text" name="price" class="addgoods__text" value="<?=$section[2][1]?>" required>
                            Английский: <input type="text" name="price_en" class="addgoods__text" value="<?=$section_en[2][1]?>" required>
                        </div>
                        <label for="" class="addgoods__label">Текст валюты после ценны товара (Руб.):</label>
                        <div>
                            Русский: <input type="text" name="rub" class="addgoods__text" value="<?=$section[3][1]?>" required>
                            Английский: <input type="text" name="rub_en" class="addgoods__text" value="<?=$section_en[3][1]?>" required>
                        </div>
                        <label for="" class="addgoods__label">Текст заголовка боковай панели:</label>
                        <div>
                            Русский: <input type="text" name="header" class="addgoods__text" value="<?=$section[4][1]?>" required>
                            Английский: <input type="text" name="header_en" class="addgoods__text" value="<?=$section_en[4][1]?>" required>
                        </div>
                        <label for="" class="addgoods__label">Текст перед датой публикации (Дата публикации):</label>
                        <div>
                            Русский: <input type="text" name="date" class="addgoods__text" value="<?=$section[5][1]?>" required>
                            Английский: <input type="text" name="date_en" class="addgoods__text" value="<?=$section_en[5][1]?>" required>
                        </div>

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
