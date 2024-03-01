<!DOCTYPE html>
<html lang="<?= $kirby->language()->code() ?>">

<?php snippet('ascii') ?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= snippet('seo/meta') ?>
  <?= css('assets/bundle/css/bundle.css') ?>

</head>

<body>

  <div id="<?= $page->intendedTemplate() ?>">
    <!-- header -->

    <header id="header">
      <ul>
        <?php

        // Get the parent page object
        $siblings = $page->siblings(); // Gets all siblings of the current page
        $index = $siblings->indexOf($page);
        $itemPosition = 0;

        $home = $site->find("home");
        $about = $site->find("about");
        if ($home->hasChildren()) :
          for ($i = 0; $i < 1; $i++) :
            $projects = $home->children();
            foreach ($projects as $project) :
              $floatingImage = $project->floatingImage()->toFile();
        ?>

              <li><a <?= e($itemPosition == $index, "class=\"active\"", "") ?> href="<?= $project->url() ?>" data-floating-url="<?= $floatingImage->resize(500, null)->url() ?>"><?= $project->title() ?></a></li>

            <?php

              $itemPosition++;

            endforeach ?>
          <?php endfor ?>
        <?php else : ?>
          <li> there is not project to display for the moment</li>
        <?php endif ?>
        <li>Art by <a href="<?= $about->url() ?>" data-floating-url="<?= $about->floatingImage()->toFile()->resize(500, null)->url() ?>">flore faucheux</a></li>
      </ul>
    </header>

    <div id="floating-thumb"></div>