<a class="content__link" href="changearticles.php?id=<?= $articles["id"] ?>">
    <div class="content__item">
        <p>id: <?= $articles['id'] ?></p>
        <h5 class="newscontent__subject"><?= mb_strimwidth($articles['subject'], 0, 20, '...', 'utf-8') ?></h5>
    </div>
</a>