<?php
require('php/connection.php');
require('php/lang.php');
require('php/section.php');
require('php/section_other.php');
$breadcrumbs = [
    $sections[0][1] => $sections[0][2],
    $sections[4][1] => $sections[4][2],
];
$section = $sections[4];
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
            <div class="main__breadcrumbs">
                <? require('components/breadcrumbs.php') ?>
            </div>
            <div class="main__container">
                <section>
                    <div class="main__header">
                        <h1 class="main__subject subject"><?=$section[1]?></h1>
                    </div>
                    <div class="main__body about">
                        <div class="about__body">
                            <div class="about__block about__a">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum maxime vitae pariatur error cupiditate, sunt eius voluptatum obcaecati aliquam delectus repudiandae optio quia magni eaque placeat vel voluptatibus sapiente. Delectus.</div>
                            <div class="about__block about__b">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, necessitatibus. Natus eligendi harum magni eius optio modi sint quod quam recusandae, libero sunt voluptatem corporis quia obcaecati labore explicabo. Excepturi!</div>
                            <div class="about__block about__c"></div>
                            <div class="about__block about__d"></div>
                            <div class="about__block about__e"></div>
                            <div class="about__block about__f"></div>
                            <div class="about__block about__g"></div>
                        </div>
                    </div>
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