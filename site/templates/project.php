<?php snippet('header') ?>

<main id="gallery">

    <?php
    if ($page->hasFiles()) :
        $images = $page->gallery()->toFiles();
        for ($i = 0; $i < 1; $i++) : // Multiply objects for testing purposes
            foreach ($images as $image) :
                $sizes = "(min-width: 1200px) 40vh, 100vw";
    ?>
                <button>
                    <picture
                        data-title="<?= $image->artworkTitle() ?>"
                        data-year="<?= $image->ArtworkYear() ?>"
                        data-technique="<?= $image->ArtworkTechnique() ?>"
                        data-size="<?= $image->ArtworkSize() ?>"
                        data-more="<?= $image->ArtworkMore() ?>">
                        <source data-srcset="<?= $image->srcset('avif') ?>" sizes="<?= $sizes ?>" type="image/avif">
                        <source data-srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp">
                        <img alt="<?= $image->alt() ?>" src="<?= $image->blurhashUri() ?>" data-srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" width="<?= $image->resize(1800)->width() ?>" height="<?= $image->resize(1800)->height() ?>" data-lazyload>
                    </picture>
                </button>


            <?php endforeach ?>
        <?php endfor ?>
    <?php endif ?>
</main>
<div id="focus">
    <div id="focus__header">
        <div id="focus__infos">
        </div>
        <button id="focus_close-btn">close</button>
    </div>

    <div id="focus__artwork">
    </div>

</div>

<?php snippet('footer') ?>