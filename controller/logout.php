<?php
setcookie('user_id', '', time() - 3600, '/');

header('Location: ../home.php');

?>