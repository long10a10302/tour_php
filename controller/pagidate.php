<?php
for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
        <a class="pagidate" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
    <?php } else { ?>
        <strong><?= $num ?></strong>
    <?php } ?>
<?php } ?>
