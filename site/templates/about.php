<?php snippet('header') ?>

<!-- main content -->

<main id="informations">

    <!-- biography -->
    <section id="bio">
        <p><?= kti($page->biography()) ?></p>
    </section>

    <!-- solo shows -->
    <section id="solo-shows">
        <p>
            Solo Shows: <br />
            <?php foreach ($page->soloShows()->toStructure() as $show) :

            ?>
                <?= $show->name() ?>
                <?= e(
                    // Language date format
                    $kirby->language()->code() === "en",
                    "(" . $show->startingDate()->toDate('Y.m.d') . " / " . $show->endingDate()->toDate('Y.m.d')  . ")",
                    $show->startingDate()->toDate('d.m.Y') . " / " . $show->endingDate()->toDate('d.m.Y') . ")"
                )
                ?>

            <?php endforeach ?>
        </p>
    </section>

    <!-- duo shows -->
    <section id="duo-shows">
        <p>
            Duo Shows: <br />
            <?php foreach ($page->duoShows()->toStructure() as $show) :

            ?>
                <?= $show->name() ?>
                <?= e(
                    // Language date format
                    $kirby->language()->code() === "en",
                    "(" . $show->startingDate()->toDate('Y.m.d') . " / " . $show->endingDate()->toDate('Y.m.d')  . ")",
                    $show->startingDate()->toDate('d.m.Y') . " / " . $show->endingDate()->toDate('d.m.Y') . ")"
                )
                ?>

            <?php endforeach ?>
        </p>
    </section>

    <!-- group shows -->
    <section id="group-shows">
        <p>
            Group Shows: <br />
            <?php foreach ($page->duoShows()->toStructure() as $show) :

            ?>

                <?= $show->name() ?>
                <?= e(
                    // Language date format
                    $kirby->language()->code() === "en",
                    "(" . $show->startingDate()->toDate('Y.m.d') . " / " . $show->endingDate()->toDate('Y.m.d')  . ")",
                    $show->startingDate()->toDate('d.m.Y') . " / " . $show->endingDate()->toDate('d.m.Y') . ")"
                )
                ?>


            <?php endforeach ?>
        </p>
    </section>

    <!-- assistant -->
    <section id="assistant">
        <p>
            Assistant: <br />
            <?php foreach ($page->assistant()->toStructure() as $assistant) :

            ?>

                <?= $assistant->name() ?>
                <?= e(
                    // Language date format
                    $kirby->language()->code() === "en",
                    "(" . $assistant->startingDate()->toDate('Y.m.d') . " / " . $assistant->endingDate()->toDate('Y.m.d')  . ")",
                    $assistant->startingDate()->toDate('d.m.Y') . " / " . $assistant->endingDate()->toDate('d.m.Y') . ")"
                )
                ?>


            <?php endforeach ?>
        </p>
    </section>

    <!-- residencies -->
    <section id="residencies">
        <p>
            Residencies: <br />
            <?php foreach ($page->residencies()->toStructure() as $residency) :

            ?>

                <?= $residency->name() ?>
                <?= e(
                    // Language date format
                    $kirby->language()->code() === "en",
                    "(" . $residency->startingDate()->toDate('Y.m.d') . " / " . $residency->endingDate()->toDate('Y.m.d')  . ")",
                    $residency->startingDate()->toDate('d.m.Y') . " / " . $residency->endingDate()->toDate('d.m.Y') . ")"
                )
                ?>


            <?php endforeach ?>
        </p>
    </section>
</main>
<?php snippet('footer') ?>