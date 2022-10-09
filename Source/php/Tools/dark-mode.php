<?php
$mode = (isset($_POST['mode']) && $_POST['mode'] == 1) ? 'dark-mode' : '';
setcookie("dark-mode", $mode, time() + (60 * 60 * 24 * 30 * 12), '/');
exit($_POST['mode']);
