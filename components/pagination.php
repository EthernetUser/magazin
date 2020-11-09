<div class="pagination">
    <?php
    $sqlQuery = "SELECT COUNT(*) as count FROM $dbtable";
    $result = mysqli_query($connection, $sqlQuery);
    $count = mysqli_fetch_assoc($result)['count'];
    $pagesCount = ceil($count / $notesOnPage);
    if ($page > 1) {
        $prev = $page - 1;
        echo "<a href=\"?page=$prev&lang=$lang\" class=\"pagination__button\"><</a>";
    }
    ?>
    <?php
    for ($i = 1; $i <= $pagesCount; $i++) :
        if ($page == $i) :
    ?>

        <a href="?page=<?= $i ?>&lang=<?=$lang?>" class="pagination__button-active"><?= $i ?></a>
        <? else: ?>
        <a href="?page=<?= $i ?>&lang=<?=$lang?>" class="pagination__button"><?= $i ?></a>
        <?php endif; ?>

    <?php endfor;
    if ($page < $pagesCount && $pagesCount > 2) {
        $next = $page + 1;
        echo "<a href=\"?page=$next&lang=$lang\" class=\"pagination__button\">></a>";
    }
    ?>

</div>