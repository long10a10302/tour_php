<?php
$idUser = isset($_GET['id_user']) ? $_GET['id_user'] : 0;
if($idUser > 0)
for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page ) { ?>
        <a class="pagidate" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>&id_user=<?=$_GET['id_user']?>"><?= $num ?></a>
    <?php } else { ?>
        <strong><?= $num ?></strong>
    <?php } ?>
<?php } else { for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page ) { ?>
        <a class="pagidate" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>?>"><?= $num ?></a>
    <?php } else { ?>
        <strong><?= $num ?></strong>
<?php } } } ?>

