<?php ob_start(); ?>



<p>Bienvenue sur notre store !</p>




<?php

$content = ob_get_clean();
$title = "Bienvenue chez VTC";
require_once "base.html.php";

?>