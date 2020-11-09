
<a class="content__link" href="changesection.php?id=<?= $section["id"] ?>">
    <div class="content__item">
        <p>id: <?= $section['id'] ?></p>
        <h5 class="content__name"><?= mb_strimwidth($section['name'], 0, 20, '...', 'utf-8') ?></h5>
    </div>
</a>