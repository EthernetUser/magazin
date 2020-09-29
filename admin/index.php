<?php
    session_start();
    require('../php/connection.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="login">
        <form action="" method="post" class="login__form">
            <label for="" class="login__label">Административная панель</label>
            <input type="text" class="login__text" required>
            <input type="password" class="login__text" required>
            <input type="submit" class="login__button" value="Войти">
            <a href="../" class="login__button">Назад</a>
        </form>
    </div>
</body>
</html>