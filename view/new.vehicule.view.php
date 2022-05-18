<?php ob_start(); ?>



<!-- <p>Formualire ajout d'un nouveau véhicule  </p> -->

<form class="bg-light shadow  text-center " method="POST" action="<?= URL ?>vehicules/vvalid">
  <div class="form-group">
    <label for="marque">Marque</label>
    <input type="text" name="marque" class="form-control" id="marque">
  </div>
  <div class="form-group">
    <label for="modele">Modèle</label>
    <input type="text" name="modele" class="form-control" id="modele">
  </div>
  <div class="form-group">
    <label for="couleur">Couleur</label>
    <input type="text" name="couleur" class="form-control" id="couleur">
  </div>
  <div class="form-group">
    <label for="immatriculation">Immatriculation </label>
    <input type="text" name="immatriculation" class="form-control" id="immatriculation">
  </div>
  <button class="container bold  btn btn-success p-2 " type="submit">Valider  </button>
</form>




<?php

$content = ob_get_clean();
$title = "Ajouter un jeu ";
require_once "base.html.php";

?>