<?php ob_start(); ?>



<p>Formualire ajout d'un conducteur  </p>

<form class="bg-light" method="POST" action="<?= URL ?>associations/avalid">
  <div class="form-group">
    <label for="id_vehicule">Identifiant véhicule</label>
    <input type="number" name="id_vehicule" class="form-control" id="id_vehicule">
  </div>
  <div class="form-group">
    <label for="id_conducteur">Identifiant conducteur</label>
    <input type="number" name="id_conducteur" class="form-control" id="id_conducteur">
  </div>
  <button class="btn btn-success" type="submit">Ajouter une association  </button>
</form>




<?php

$content = ob_get_clean();
$title = "Ajouter une association ";
require_once "base.html.php";

?>