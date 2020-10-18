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
                    <h1 class="main__subject subject">Главная</h1>
                </div>
                <div class="main__body content">
                    <a class="content__link" href="goods.php">
                        <div class="content__item">
                            <h5 class="content__name">Управление товарами</h5>
                            <p class="content__description"></p>
                        </div>
                    </a>
                    <a class="content__link" href="news.php">
                        <div class="content__item">
                            <h5 class="content__name">Управление новостями</h5>
                            <p class="content__description"></p>
                        </div>
                    </a>
                    <a class="content__link" href="articles.php">
                        <div class="content__item">
                            <h5 class="content__name">Управление статьями</h5>
                            <p class="content__description"></p>
                        </div>
                    </a>
                    
                </div>
                <div class="main__footer pagination">
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php
mysqli_close($connection);
?>