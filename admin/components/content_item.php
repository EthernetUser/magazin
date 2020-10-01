<div class="content__item">
    <p>id: <?=$goods['id']?></p>
    <h5 class="content__name"><?= mb_strimwidth($goods['name'],0,20,'...','utf-8') ?></h5>
    <img src="../<?= $goods['img-path'] ?>" style="width: 100%;" class="content__img" alt="">
    <p class="content__description"><?= mb_strimwidth($goods['description'],0,50,"...", 'utf-8')?></p>
    <p class="content__price">Цена: <?= $goods['price'] ?>p</p>
</div>