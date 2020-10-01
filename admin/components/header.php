<header class="header">
    <div class="header__header">
        Административная панель<br> Добро пожаловать, <?=$_SESSION['name'];?>!
    </div>
    <div>
        <form action="php/quit-script.php" method="post" style="display: inline;">
            <input type="submit" class="header__button" value="Выйти из аккаунта"></input>
        </form>
        <a href="../." class="header__button">Вернуться на сайт</a>
    </div>
    
</header>