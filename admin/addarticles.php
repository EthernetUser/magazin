<?php
session_start();
require('../php/connection.php');
    require('../php/adminfuncs.php');
CheckAvailability();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
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
                    <h1 class="main__subject subject">Добавить статью</h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/addarticles-script.php" method="post" class="addgoods__form">
                        <label for="" class="addgoods__label">Заголовок:</label>
                        <input type="text" name="subject" class="addgoods__text" required>

                        <label for="" class="addgoods__label">Заголовок (Английский):</label>
                        <input type="text" name="subject_en" class="addgoods__text" required>

                        <label for="" class="addgoods__label">Текст:</label>
                        <textarea name="text" class="addgoods__textarea" id="text" cols="30" rows="10" required></textarea>

                        <label for="" class="addgoods__label">Текст (Английский):</label>
                        <textarea name="text_en" class="addgoods__textarea" id="text_en" cols="30" rows="10" required></textarea>
                        
                        <input type="submit" value="Добавить" class="addgoods__button">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="js/newsscript.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>