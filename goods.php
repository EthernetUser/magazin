<?php
require('php/connection.php');
require('php/lang.php');
require('php/section.php');
require('php/section_other.php');
$breadcrumbs = [
    $sections[0][1] => $sections[0][2],
    $sections[1][1] => $sections[1][2]
];
$section = $sections[1];
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
                    <div class="main__body content">
                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        $notesOnPage = $section[3];
                        $from = ($page - 1) * $notesOnPage;
                        $dbtable = "goods_$lang";

                        $sqlQyery = "SELECT * FROM `$dbtable` ORDER BY `id` DESC LIMIT $from,$notesOnPage";
                        if (!$query = mysqli_query($connection, $sqlQyery)) {
                            echo 'server error!';
                        }

                        while ($goods = mysqli_fetch_assoc($query)) {
                            include('components/content_item.php');
                        }
                        ?>
                    </div>
                    <div class="main__footer">

                        <!-- Пагинация -->
                        <? include('components/pagination.php'); ?>

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