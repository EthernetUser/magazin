<?php
session_start();
require('../php/connection.php');
CheckAvailability();
$id = $_GET['id'];
if(!isset($id) || empty($id)){
    echo 'wrong get request!';
    mysqli_close($connection);
    exit();
}
if(!$query = mysqli_query($connection,"SELECT * FROM `goods` WHERE `id` = '$id'")) {
    echo 'query error!';
    var_dump($query);
    mysqli_close($connection);
    exit();
}
$goods = mysqli_fetch_assoc($query);
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
                    <h1 class="main__subject subject">Изменить товар</h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/changegoods-script.php" method="post" class="addgoods__form" enctype="multipart/form-data">
                        <label for="" class="addgoods__label">Название:</label>
                        <input type="text" name="name" class="addgoods__text" value="<?=$goods['name']?>" required>
                        <label for="" class="addgoods__label">Картинка:</label>
                        <p class="addgoods__littletxt">(Если менять картинку не нужно - оставьте поле пустым)</p>
                        <input type="file" name="img" class="addgoods__file">
                        <label for="" class="addgoods__label">Описание:</label>
                        <textarea name="description" class="addgoods__textarea" id="" cols="30" rows="10" required><?=$goods['description']?></textarea>
                        <label for="" class="addgoods__label">Цена:</label>
                        <input type="number" name="price" class="addgoods__text" value="<?=$goods['price']?>" required>
                        <input type="hidden" name="id" id="id" value="<?=$goods['id']?>">
                        <div>
                            <input type="submit" value="Изменить" class="addgoods__button">
                            <input type="button" value="Удалить" class="addgoods__button-delete" onclick="DeleteGoods()">
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