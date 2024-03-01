<?php snippet('header') ?>

<!-- main content -->

<main id="carousel-container">

    <!-- slider -->

    <div id="project__gallery">
        <div class="carousel">

            <?php
            if ($page->hasFiles()) :
                $images = $page->gallery()->toFiles();
                foreach ($images as $image) :

                    $placeholder = $image->placeholderUri([
                        'width' => 30,
                        'ratio' => $image->ratio()
                    ]);        

                    $sizes = "(min-width: 1200px) 50vw,
                            (min-width: 900px) 33vw,
                            (min-width: 600px) 50vw,
                            100vw";
            ?>
            <div class="carousel-cell">
                <picture>
                    <source
                        data-flickity-lazyload-srcset="<?= $image->srcset('avif') ?>"
                        sizes="<?= $sizes ?>"
                        type="image/avif"
                    >
                    <source
                        data-flickity-lazyload-srcset="<?= $image->srcset('webp') ?>"
                        sizes="<?= $sizes ?>"
                        type="image/webp"
                    >
                    <img
                        alt="<?= $image->alt() ?>"
                        src="<?= $placeholder ?>"
                        data-flickity-lazyload-srcset="<?= $image->srcset() ?>"
                        sizes="<?= $sizes ?>"
                        width="<?= $image->resize(1800)->width() ?>"
                        height="<?= $image->resize(1800)->height() ?>"
                    >
                </picture>
            </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <div id="carousel-index"></div>
    </div>

    <!-- description -->

    <div id="project-description">
        <p>
            <?= kti($page->description()) ?>
        </p>
    </div>

</main>

<?php snippet('footer') ?>