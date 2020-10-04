<nav class="nav">
    <ul class="nav__menu menu">
        <li class="menu__item"><a href=".">Главная</a></li>
        <li class="menu__item"><a href="addgoods.php">Добавить товар</a></li>
        <li class="menu__item"><a href="addnews.php">Добавить новость</a></li>
        <li class="menu__item"><a href="addarticles.php">Добавить статью</a></li>
        <?php
        if($_SESSION['role'] === 'admin'):
        ?>
        <li class="menu__item"><a href="adduser.php">Добавить пользователя</a></li>
        <?php 
        endif;
        ?>
        
    </ul>
</nav>