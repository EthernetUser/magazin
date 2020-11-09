<?php
require('php/connection.php');
require('php/lang.php');
require('php/section_other.php');
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">

<head>
    <? require('components/head.php'); ?>
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
                <section>
                    <div class="main__header">
                        
                    </div>
                    <h1>Ошибка 404! Данной страницы не сушествует.</h1>
                </section>
            </div>
        </main>

        <!-- Подвал сайта -->
        <? require('components/footer.php'); ?>
    </div>
</body>

</html>
<?php
    mysqli_close($connection);
?>