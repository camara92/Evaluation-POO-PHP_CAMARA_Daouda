<?php ob_start(); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container border bg-light my-5 bold">
        <img src="./assets/images/velo.jpg" height="400px" class="w-100" alt="image velo ">
    </div>
</body>
</html>




<?php

$content = ob_get_clean();
$title = "Bienvenue chez VTC";
require_once "base.html.php";

?>