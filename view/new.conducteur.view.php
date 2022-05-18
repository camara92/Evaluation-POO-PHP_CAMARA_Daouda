<?php ob_start(); ?>



<p>Formualire ajout d'un conducteur  </p>

<form method="POST" action="<?= URL ?>conducteurs/cvalid">
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" class="form-control" id="prenom">
  </div>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" name="nom" class="form-control" id="nom">
  </div>
  <button class="btn btn-success" type="submit">Ajouter un conducteur </button>
</form>




<?php

$content = ob_get_clean();
$title = "Ajouter un conducteur";
require_once "base.html.php";

?>