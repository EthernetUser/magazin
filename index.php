<?php
require('php/connection.php');
require('php/lang.php');
require('php/section.php');
require('php/section_other.php');
$breadcrumbs = [
    $sections[0][1] => $sections[0][2]
];
$section = $sections[0];
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
                        <h1 class="main__subject subject"><?=$sections[3][1]?></h1>
                    </div>
                    <div class="main__body list">
                        <?php
                        $countNotes = intval($section[3]);
                        if (!$query = mysqli_query($connection, "SELECT * FROM `articles_$lang` ORDER BY `id` DESC LIMIT $countNotes")) {
                            echo 'server error!';
                        }

                        while ($articles = mysqli_fetch_assoc($query)) {
                            include('components/article_item.php'); 
                        }
                        ?>
                    </div>
                    <div class="main__footer pagination">
                        <a href="articles?lang=<?=$lang?>" class="pagination__button"><?=$section_other[1][0]?> "<?=$sections[3][1]?>"</a>
                    </div>
                </section>
                <section>

                    <div class="main__header">
                        <h1 class="main__subject subject"><?=$sections[1][1]?></h1>
                    </div>
                    <div class="main__body content">
                        <?php
                        if (!$query = mysqli_query($connection, "SELECT * FROM `goods_$lang` ORDER BY `id` DESC LIMIT $countNotes")) {
                            echo 'server error!';
                        }
    
                        while ($goods = mysqli_fetch_assoc($query)) {
                            include('components/content_item.php');
                        }
                        ?>
                    </div>
                    <div class="main__footer pagination">
                    <a href="goods?lang=<?=$lang?>" class="pagination__button"><?=$section_other[1][0]?> "<?=$sections[1][1]?>"</a>
                    </div>
                </section>
            </div>
        </main>

        <!-- Подвал сайта -->
        <? require('components/footer.php'); ?>
        <? require('components/topscroller.php') ?>
    </div>
</body>

</html>
<?php
mysqli_close($connection);
?>
