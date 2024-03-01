<?php snippet('header') ?>

<!-- projects list -->

<section id="home__projects">
    <?php

    function dateFormater($inputYear)
    {
        $inputYear = (string) $inputYear;
        if ($inputYear !== "0") {
            $truncateYear = substr($inputYear, -2);
            $outputYear = "." . $truncateYear;
        } else {
            $outputYear = "XX";
        }
        return $outputYear;
    }

    if ($page->hasChildren()) :
        $projects = $page->children();
        foreach ($projects as $project) :
            $floatingImage = $project->floatingImage()->toFile();
    ?>

            <a href="<?= $project->url() ?>" class="project-item" data-floating-url="<?= $floatingImage->resize(1000, 800)->url() ?>">
                <div class="project-item__name">
                    <?= $project->title() ?>
                </div>
                <div class="project-item__date">
                    <?= dateFormater($project->year()) ?>

                </div>
            </a>

        <?php endforeach ?>
    <?php endif ?>
</section>

<!-- footer -->

<footer id="home__footer">
    <div id="footer__legal">
        <h1>
            <a id="info-hook" href="<?= $site->find("about")->url() ?>">
                informations
            </a>
        </h1>
    </div>
    <div id="footer__about">
        <h2>
            <a href="<?= $site->find("legal")->url() ?>">
            <?= $site->find("legal")->title() ?>
            </a>
        </h2>
    </div>
</footer>

<div id="floating-container"></div>

<?php snippet('footer') ?>