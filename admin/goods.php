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
                    <h1 class="main__subject subject">Управление товарами</h1>
                </div>
                <div class="main__body content">
                    <?php
                    if(!$query = mysqli_query($connection,"SELECT * FROM `goods` ORDER BY `id` DESC")){
                        echo 'server error!';
                    }

                    while ($goods = mysqli_fetch_assoc($query)){
                        require('components/content_item.php');
                    } 
                    ?>
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
    </div>
</body>

</html>
<?php
    mysqli_close($connection);
?>