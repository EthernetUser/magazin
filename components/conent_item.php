<div class="content__item">
    <h5 class="content__name"><?= mb_strimwidth($goods['name'],0,20,'...','utf-8') ?></h5>
    <img src="../<?= $goods['img-path'] ?>" class="content__img" style="width: 100%;" alt="">
    <p class="content__description" maxlength="10"><?= mb_strimwidth($goods['description'],0,50,"...", 'utf-8') ?></p>
    <p class="content__price"><span>Цена: </span><?= $goods['price'] ?>р</p>
</div>