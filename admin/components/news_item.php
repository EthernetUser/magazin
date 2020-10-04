<a class="content__link" href="changenews.php?id=<?= $news["id"] ?>">
    <div class="content__item">
        <p>id: <?= $news['id'] ?></p>
        <h5 class="newscontent__subject"><?= mb_strimwidth($news['subject'], 0, 20, '...', 'utf-8') ?></h5>
    </div>
</a>