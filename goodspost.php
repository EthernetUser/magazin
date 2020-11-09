<?php
require('php/connection.php');
require('php/lang.php');
require('php/section.php');
require('php/section_other.php');
$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    header('Location: /');
}
$id = intval($id);
if (!$query = mysqli_query($connection, "SELECT * FROM `goods_$lang` WHERE `id` = '$id'")) {
    echo 'query error!';
    mysqli_close($connection);
    exit();
}
if ($query->num_rows !== null && $query->num_rows !== 0) {
    $currentGoods = mysqli_fetch_assoc($query);
} else {
    header('Location: 404');
}

$breadcrumbs = [
    $sections[0][1] => $sections[0][2],
    $sections[1][1] => $sections[1][2],
    $currentGoods['name'] => "goodspost?id=" . $_GET['id'] . "&"
];
$section = $sections[1];
?>
<!DOCTYPE html>
<html lang="<?=$lang?>">


<head>
    <? require('components/head.php'); ?>
</head>

<body>
    <!-- <div class="imglightbox"></div> -->
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
                    <div class="main__body goods">
                        <div class="goods__img">
                            <img src="<?= $currentGoods['img-path'] ?>" alt="">
                        </div>
                        <h3 class="goods__name"><strong><?= $currentGoods['name'] ?></strong></h3>
                        <p class="goods__price"><strong><?=$section_other[2][0]?>: <?= $currentGoods['price'] ?> <?=$section_other[3][0]?></strong></p>
                        <p class="goods__description"><?= $currentGoods['description'] ?></p>
                    </div>
                </section>
            </div>
        </main>

        <!-- Подвал сайта -->
        <? require('components/footer.php'); ?>
    </div>
    <script src="js/imglightbox.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>