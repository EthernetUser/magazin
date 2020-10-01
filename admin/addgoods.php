<?php
session_start();
require('../php/connection.php');
CheckAvailability();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="adminwrapper">
        <? require('components/header.php');?>

        <? require('components/navigation.php');?>

        <main class="main">
            <div class="main__container">
                <div class="main__header">
                    <h1 class="main__subject subject">Добавить товар</h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/addgoods-script.php" method="post" class="addgoods__form" enctype="multipart/form-data">
                        <label for="" class="addgoods__label">Название:</label>
                        <input type="text" name="name" class="addgoods__text" required>
                        <label for="" class="addgoods__label">Картинка:</label>
                        <input type="file" name="img" class="addgoods__file" required>
                        <label for="" class="addgoods__label">Описание:</label>
                        <textarea name="description" class="addgoods__textarea" id="" cols="30" rows="10" required></textarea>
                        <label for="" class="addgoods__label">Цена:</label>
                        <input type="number" name="price" class="addgoods__text" required>
                        <input type="submit" value="Добавить" class="addgoods__button">
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php
    mysqli_close($connection);
?>