<nav class="nav">
    <ul class="nav__menu menu" id="nav">
        <li class="menu__item"><a href=".?lang=<?=$lang?>"><?=$sections[0][1]?></a></li>
        <li class="menu__item"><a href="goods?lang=<?=$lang?>"><?=$sections[1][1]?></a></li>
        <li class="menu__item"><a href="news?lang=<?=$lang?>"><?=$sections[2][1]?></a></li>
        <li class="menu__item"><a href="articles?lang=<?=$lang?>"><?=$sections[3][1]?></a></li>
        <li class="menu__item"><a href="about?lang=<?=$lang?>"><?=$sections[4][1]?></a></li>
        <li class="menu__item"><a href="contacts?lang=<?=$lang?>"><?=$sections[5][1]?></a></li>
    </ul>
    <ul class="nav__menu menu">
        <?php
            if($lang === 'en'):
        ?>
        <li class="menu__item"><a data-href="?<?=$newReqLang?>lang=ru" data-lang="ru">Русский</a></li>
        <? else: ?>
        <li class="menu__item"><a data-href="?<?=$newReqLang?>lang=en" data-lang="en">English</a></li>
        <?php endif; ?>
        </ul>
    <div class="nav__hamburger">
        <div class="nav__container">
            <img class="nav__logo" src="img\site\logo.png" alt="">
            <img class="nav__img" id="nav-expand" src="img\site\Hamburger_icon.svg.png" alt="">
        </div>
    </div>
    <script src="js/changelang.js"></script>
    <script src="js/expand-nav.js"></script>
</nav>