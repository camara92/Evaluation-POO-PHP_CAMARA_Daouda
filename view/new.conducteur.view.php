<?php ob_start(); ?>


<form class="bg-light bold" method="POST" action="<?= URL ?>conducteurs/cvalid">
  <div class="form-group bg-dark text-white text-center bold ">
    <label for="prenom">Prénom</label>
    <input  type="text" name="prenom" class="form-control text-center" placeholder="saisir votre prénom" id="prenom" >
  </div>
  <div class="form-group bg-dark text-white text-center bold">
    <label for="nom">Nom</label>
    <input  type="text" name="nom" class="form-control text-center" placeholder="saisir votre nom" id="nom">
  </div>
  <button class="btn btn-success text-white text-center bold" type="submit">Ajouter un conducteur </button>
</form>




<?php

$content = ob_get_clean();
$title = "Ajouter un conducteur";
require_once "base.html.php";

?>