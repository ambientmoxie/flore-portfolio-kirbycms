<?php
$legal   = $site->find("legal");
$isLegal = $page->intendedTemplate() == "legal";
?>

<footer id="footer">
    <ul>
        <li><a <?= e($legal == $isLegal, "class=\"active\"", "") ?> href="<?= $site->find("legal")->url() ?>">Privacy Policy</a></li>
        <li><button id="switch-theme">Loading Mode</button></li>
        <?php foreach ($kirby->languages() as $language) :
            // Toogle between two languages. Doesn't work if more loanguages are set up.
        ?>
            <?php if ($kirby->language() !== $language) : ?>
                <li>
                    <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
                        <?= html($language->name()) ?>
                    </a>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</footer>

</div>
<?= js('assets/bundle/js/bundle.js') ?>
</body>

</html>