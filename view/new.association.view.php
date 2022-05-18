<?php ob_start(); ?>



<p>Formualire ajout d'un conducteur  </p>

<form class="bg-light" method="POST" action="<?= URL ?>conducteurs/cvalid">
  <div class="form-group">
    <label for="id_vehicule">IdVehicule</label>
    <input type="number" name="id_vehicule" class="form-control" id="id_vehicule">
  </div>
  <div class="form-group">
    <label for="id_conducteur">IdConducteur</label>
    <input type="number" name="id_conducteur" class="form-control" id="id_conducteur">
  </div>
  <button class="btn btn-success" type="submit">Ajouter une association  </button>
</form>




<?php

$content = ob_get_clean();
$title = "Ajouter une association ";
require_once "base.html.php";

?>