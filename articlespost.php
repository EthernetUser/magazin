<?php
require('php/connection.php');
require('php/lang.php');
require('php/section_other.php');
$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    header('Location: /');
}
$id = intval($id);
if (!$query = mysqli_query($connection, "SELECT * FROM `articles_$lang` WHERE `id` = '$id'")) {
    echo 'query error!';
    mysqli_close($connection);
    exit();
}
if ($query->num_rows !== null && $query->num_rows !== 0) {
    $currentArticles = mysqli_fetch_assoc($query);
} else {
    header('Location: 404');
}
require('php/section.php');
$breadcrumbs = [
    $sections[0][1] => $sections[0][2],
    $sections[3][1] => $sections[3][2],
    $currentArticles['subject'] => "articlespost?id=" . $_GET['id'] . "&"
];
$section = $sections[3];
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">

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
                    <div class="main__body news">
                        <h2 class="news__subject"><?= $currentArticles['subject'] ?></h2>
                        <p class="news__date"><?=$section_other[5][0]?>: <?= $currentArticles['date'] ?></p>
                        <div class="news__text"><?= $currentArticles['text'] ?></div>
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