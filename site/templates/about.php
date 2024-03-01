<?php snippet('header') ?>

<!-- main content -->

<main id="about__content">

    <!-- biography -->
    <section id="about__biography">
        <p><?= kti($page->biography()) ?></p>
    </section>

    <!-- solo shows -->
    <section id="about__solo-shows">
        <p>
            Solo Shows: <br />
            <?php foreach ($page->soloShows()->toStructure() as $show) :

            ?>
                <span>
                    <?= $show->name() ?>
                    <?= e(
                        // Language date format
                        $kirby->language()->code() === "en",
                        "(" . $show->startingDate()->toDate('Y.m.d') . " / " . $show->endingDate()->toDate('Y.m.d')  . ")",
                        $show->startingDate()->toDate('d.m.Y') . " / " . $show->endingDate()->toDate('d.m.Y') . ")"
                    )
                    ?>
                </span>

            <?php endforeach ?>
        </p>
    </section>

    <!-- duo shows -->
    <section id="about__duo-shows">
        <p>
            Duo Shows: <br />
            <?php foreach ($page->duoShows()->toStructure() as $show) :

            ?>
                <span>
                    <?= $show->name() ?>
                    <?= e(
                        // Language date format
                        $kirby->language()->code() === "en",
                        "(" . $show->startingDate()->toDate('Y.m.d') . " / " . $show->endingDate()->toDate('Y.m.d')  . ")",
                        $show->startingDate()->toDate('d.m.Y') . " / " . $show->endingDate()->toDate('d.m.Y') . ")"
                    )
                    ?>
                </span>

            <?php endforeach ?>
        </p>
    </section>

    <!-- group shows -->
    <section id="about__group-shows">
        <p>
            Group Shows: <br />
            <?php foreach ($page->duoShows()->toStructure() as $show) :

            ?>
                <span>
                    <?= $show->name() ?>
                    <?= e(
                        // Language date format
                        $kirby->language()->code() === "en",
                        "(" . $show->startingDate()->toDate('Y.m.d') . " / " . $show->endingDate()->toDate('Y.m.d')  . ")",
                        $show->startingDate()->toDate('d.m.Y') . " / " . $show->endingDate()->toDate('d.m.Y') . ")"
                    )
                    ?>
                </span>

            <?php endforeach ?>
        </p>
    </section>

    <!-- assistant -->
    <section id="about__assistant">
        <p>
            Assistant: <br />
            <?php foreach ($page->assistant()->toStructure() as $assistant) :

            ?>
                <span>
                    <?= $assistant->name() ?>
                    <?= e(
                        // Language date format
                        $kirby->language()->code() === "en",
                        "(" . $assistant->startingDate()->toDate('Y.m.d') . " / " . $assistant->endingDate()->toDate('Y.m.d')  . ")",
                        $assistant->startingDate()->toDate('d.m.Y') . " / " . $assistant->endingDate()->toDate('d.m.Y') . ")"
                    )
                    ?>
                </span>

            <?php endforeach ?>
        </p>
    </section>

    <!-- residencies -->
    <section id="about__residencies">
        <p>
            Residencies: <br />
            <?php foreach ($page->residencies()->toStructure() as $residency) :

            ?>
                <span>
                    <?= $residency->name() ?>
                    <?= e(
                        // Language date format
                        $kirby->language()->code() === "en",
                        "(" . $residency->startingDate()->toDate('Y.m.d') . " / " . $residency->endingDate()->toDate('Y.m.d')  . ")",
                        $residency->startingDate()->toDate('d.m.Y') . " / " . $residency->endingDate()->toDate('d.m.Y') . ")"
                    )
                    ?>
                </span>

            <?php endforeach ?>
        </p>
    </section>
</main>
<?php snippet('footer') ?>