<?php ob_start(); ?>

<form class="bg-light shadow  text-center " method="POST" action="<?= URL ?>vehicules/editvalid">
  <div class="form-group">
    <label for="marque">Marque</label>
    <input type="text" name="marque"  class="form-control" value="<?=$vehicule->getMarque() ?>" id="marque">
  </div>
  <div class="form-group">
    <label for="modele">Modèle</label>
    <input type="text" name="modele"   class="form-control" value="<?=$vehicule->getModele() ?>" id="modele">
  </div>
  <div class="form-group">
    <label for="couleur">Couleur</label>
    <input type="text" name="couleur"   class="form-control" value="<?=$vehicule->getCouleur() ?>" id="couleur">
  </div>
  <div class="form-group">
    <label for="immatriculation">Immatriculation </label>
    <input type="text" name="immatriculation"  class="form-control" value="<?=$vehicule->getImmatriculation() ?>" id="immatriculation">
  </div>
  <input type="hidden" name="id_vehicule" value="<?= $vehicule->getId_vehicule() ?>">
  <button class="container bold  btn btn-success p-2 " type="submit">Valider  </button>
</form>






<?php
// value="<?= $vehicule->getcouleur() 
$content = ob_get_clean();
$title = "Modification";
require_once "base.html.php";

?>