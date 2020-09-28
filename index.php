<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin.ru</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <!-- Шапка сайта -->
        <? require('components/header.php'); ?>
        
        <!-- Навигация сайта -->
        <? require('components/navigation.php'); ?>
        
        <!-- Боковая панель  -->
        <? require('components/sidebar.php'); ?>
        
        <!-- Контентная часть -->
        <main class="main">
            <div class="main__container">
                <div class="main__header">
                    <h1 class="main__subject subject">Главная</h1>
                </div>
                <div class="main__body content">
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__item">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                    <div class="content__fixclear">

                    </div>
                </div>
                <div class="main__footer pagination">
                    <button class="pagination__button" onclick="">Показать ещё</button>
                </div>
            </div>
        </main>

        <!-- Подвал сайта -->
        <? require('components/footer.php'); ?>
    </div>
</body>

</html>