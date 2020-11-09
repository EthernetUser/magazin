<?php
session_start();
require('../php/connection.php');
    require('../php/adminfuncs.php');
CheckAvailability();
$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    echo 'wrong get request!';
    mysqli_close($connection);
    exit();
}
if (!$query = mysqli_query($connection, "SELECT * FROM `articles_ru` WHERE `id` = '$id'")) {
    echo 'query error!';
    var_dump($query);
    mysqli_close($connection);
    exit();
}

if (!$query_en = mysqli_query($connection, "SELECT * FROM `articles_en` WHERE `id` = '$id'")) {
    echo 'query error!';
    var_dump($query_en);
    mysqli_close($connection);
    exit();
}
$articles = mysqli_fetch_assoc($query);
$articles_en = mysqli_fetch_assoc($query_en);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="js/summernote-ru-RU.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="adminwrapper">
        <? require('components/header.php');?>

        <? require('components/navigation.php');?>

        <main class="main">
            <div class="main__container">
                <div class="main__header">
                    <h1 class="main__subject subject">Изменить статью</h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/changearticles-script.php" method="post" class="addgoods__form">
                        <p for="" class="addgoods__label">Заголовок:</p>
                        <input type="text" name="subject" class="addgoods__text" value="<?= $articles['subject'] ?>" required>

                        <p for="" class="addgoods__label">Заголовок (Английский):</p>
                        <input type="text" name="subject_en" class="addgoods__text" value="<?= $articles_en['subject'] ?>" required>

                        <p for="" class="addgoods__label">Текст:</p>
                        <textarea name="text" class="addgoods__textarea" id="text" cols="30" rows="10" required><?= $articles['text'] ?></textarea>

                        <p for="" class="addgoods__label">Текст (Английский):</p>
                        <textarea name="text_en" class="addgoods__textarea" id="text_en" cols="30" rows="10" required><?= $articles_en['text'] ?></textarea>

                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <div>
                            <input type="submit" value="Изменить" class="addgoods__button">
                            <input type="button" value="Удалить" class="addgoods__button-delete" onclick="DeleteArticles()">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="js/newsscript.js"></script>
    <script src="js/deletegoods.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>