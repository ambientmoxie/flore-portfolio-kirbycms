<footer id="footer">
    <ul>
        <li><a href="<?= $site->find("legal")->url() ?>">Privacy Policy</a></li>
        <li><button id="switch-theme">Loading Mode</button></li>
        <?php foreach ($kirby->languages() as $language) : ?>
            <!-- Works only if two languages are set up -->
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