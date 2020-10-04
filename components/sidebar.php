<aside class="sidebar">
    <div class="sidebar__container">
        <div class="sidebar__header">
            <h1 class="sidebar__subject subject">Последние новости</h1>
        </div>
        <div class="sidebar__body">
            <?
            if(!$query = mysqli_query($connection,"SELECT * FROM `news` ORDER BY `id` DESC LIMIT 3")) {
                echo 'server error!';
            }
            
            while ($news = mysqli_fetch_assoc($query)) {
                require('components/sidebar_item.php');
            } 
            ?>
        </div>
    </div>
</aside>