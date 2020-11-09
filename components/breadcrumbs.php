<ul class="breadcrumbs">
    <?
    $countOfBreadcrumbs = 1;
    foreach ($breadcrumbs as $key => $value){
    ?>
        <li class="breadcrumbs__item"><a href="<?=$value . "?lang=" . $lang?>"><?=$key?></a></li>
    <?
    if($countOfBreadcrumbs < count($breadcrumbs)):
    ?>
        <li class="breadcrumbs__item">-</li>
    <?
    endif;
    $countOfBreadcrumbs++;
    }
    ?>
</ul>