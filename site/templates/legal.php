<?php snippet('header') ?>
<main id="notice">
    <p>
        <?= kti($page->notice()) ?> Questions, additional clarifications or suggestions can be sent to <a href="mailto:<?= $site->emailaddress() ?>">contact@florefaucheux.com</a></p>
</main>
<?php snippet('footer') ?>