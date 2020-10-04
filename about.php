<?php
    require('php/connection.php')
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin.ru</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                    <h1 class="main__subject subject">О нас</h1>
                </div>
                <div class="main__body content">
                    
                </div>
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