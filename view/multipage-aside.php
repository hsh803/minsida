<aside>
    <nav class="multipage">
        <ul>
        <?php foreach ($pages as $key => $value) : ?>
            <?php if (isset($value["title"])) :
                $selected = null;
                if ($key === $pageReference) {
                    $selected = "class=\"selected\"";
                }
                ?>
            <li><a <?= $selected ?> href="?page=<?= $key ?>"><?= $value["title"] ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </nav>
</aside>
