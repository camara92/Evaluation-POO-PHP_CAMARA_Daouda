<?php ob_start(); ?>

<form class="bg-light shadow  text-center " method="POST" action="<?= URL ?>vehicules/editvalid">
  <div class="form-group">
    <label for="id_vehicule">Identifiant véhicule</label>
    <input type="number" name="id_vehicule"  class="form-control" id="id_vehicule">
  </div>
  <div class="form-group">
    <label for="id_conducteur">Identifiant conducteur </label>
    <input type="number" name="id_conducteur"   class="form-control" id="id_conducteur">
  </div>
 
  <button class="container bold  btn btn-success p-2 " type="submit">Valider  </button>
</form>






<?php

$content = ob_get_clean();
$title = "Modification";
require_once "base.html.php";

?>