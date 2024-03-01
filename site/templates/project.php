<?php snippet('header') ?>

<main id="gallery">

    <?php
    if ($page->hasFiles()) :
        $images = $page->gallery()->toFiles();
        foreach ($images as $image) :

            $placeholder = $image->placeholderUri([
                'width' => 30,
                'ratio' => $image->ratio()
            ]);

            $sizes = "(min-width: 1200px) 40vh, 100vw";
    ?>

            <picture>
                <source srcset="<?= $image->srcset('avif') ?>" sizes="<?= $sizes ?>" type="image/avif">
                <source srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp">
                <img alt="<?= $image->alt() ?>" src="<?= $placeholder ?>" srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>">
            </picture>

        <?php endforeach ?>
    <?php endif ?>
</main>
<div id="focus">
    <div id="focus__header">
        <div id="focus__infos">
            <h1><?= $page->artworkTitle() ?>, <?= $page->year() ?>, <?= $page->technique() ?>, <?= $page->size() ?>, <?= $page->moreInfo() ?></h1>
        </div>
        <button id="focus_close-btn">close</button>
    </div>

    <div id="focus__artwork">

    </div>

</div>

<?php snippet('footer') ?>