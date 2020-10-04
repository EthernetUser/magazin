<?php
session_start();
require('../php/connection.php');
CheckAvailability();
CheckRole('admin');
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
                    <h1 class="main__subject subject">Добавить пользователя</h1>
                </div>
                <div class="main__body addgoods">
                    <form action="php/adduser-script.php" method="post" class="addgoods__form">
                        <label for="email" class="addgoods__label">email:</label>
                        <input type="email" name="email" class="addgoods__text" id="email" required>
                        <label for="name" class="addgoods__label">name:</label>
                        <input type="text" name="name" class="addgoods__text" id="name" required>
                        <label for="pass" class="addgoods__label">password:</label>
                        <input type="password" name="pass" class="addgoods__text" id="pass" required>
                        <label for="role" class="addgoods__label">role</label>
                        <select name="role" id="role" class="addgoods__text" id="role" required>
                            <option value="admin">admin</option>
                            <option value="moderator">moderator</option>
                        </select>

                        <input type="submit" value="Добавить" class="addgoods__button">
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
<?php
    mysqli_close($connection);
?>