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

        // Store home and about page.
        $home         = $site->find("home");
        $about        = $site->find("about");
        // Boolean variable to check if user is on project template page.
        $isProject    = $page->intendedTemplate() == "project";
        $isAbout      = $page->intendedTemplate() == "about";

        $siblings     = $page->siblings(); // Check if the current page as siblings.
        $indexGlobal  = $siblings->indexOf($page); // Returns the index of the page.
        $indexProject = 0; // Create and index variable to compare with the one of the current page.

        // Object for setting attributes to project links. I'm using an object because I thought it would be clearer, but now I'm not so sure.
        class LinkAttributes
        {
          public $activeClass;
          public $url;
          public $floatingUrl;
          public $title;
        }

        function createFinalLink($indexGlobal, $indexProject, $project, $floatingImageResized, $isProject)
        {
          $linkObj = new LinkAttributes();
          $linkObj->activeClass = $indexGlobal == $indexProject && $isProject ? "class=\"active\"" : "";
          $linkObj->url = $project->url();
          $linkObj->floatingUrl = $floatingImageResized->url();
          $linkObj->title = $project->title();

          return $linkObj;
        }

        // Loop through all the children of the home page, if it has any.
        if ($home->hasChildren()) :
          for ($i = 0; $i < 1; $i++) :
            $projects = $home->children();
            foreach ($projects as $project) :
              $floatingImage        = $project->floatingImage()->toFile(); // Gets the url of the preview image for the hovering effect.
              $floatingImageResized = $floatingImage->resize(200, null); // Resized image for optimization.

              $linkAttributesObj = createFinalLink($indexGlobal, $indexProject, $project, $floatingImageResized, $isProject);
        ?>
              <li><a <?= $linkAttributesObj->activeClass ?> href="<?= $linkAttributesObj->url ?>" data-floating-url="<?= $linkAttributesObj->floatingUrl ?>"><?= $linkAttributesObj->title ?></a></li>

            <?php
            $indexProject++;
            endforeach ?>
          <?php endfor ?>
        <?php else : ?>
          <li> there is not project to display for the moment</li>
        <?php endif ?>
        <li>Art by <a <?= e($about == $isAbout, "class=\"active\"", "") ?> href="<?= $about->url() ?>" data-floating-url="<?= $about->floatingImage()->toFile()->resize(500, null)->url() ?>">flore faucheux</a></li>
      </ul>
    </header>

    <div id="floating-thumb"></div>