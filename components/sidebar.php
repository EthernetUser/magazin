<aside class="sidebar">
    <div class="sidebar__container">
        <div class="sidebar__header">
            <h1 class="sidebar__subject subject">Боковая панель</h1>
        </div>
        <div class="sidebar__body">
            <?
            for($i = 0; $i < 3; $i++):
            ?>
            <div class="sidebar__item"><?=$i?></div>
            <?
            endfor; 
            ?>
        </div>
    </div>
</aside>