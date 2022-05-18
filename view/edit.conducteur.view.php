<?php ob_start(); ?>

<form class="bg-light shadow  text-center " method="POST" action="<?= URL ?>conducteurs/editvalid">
  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom"  class="form-control" value="<?=$conducteur->getPrenom() ?>" id="prenom">
  </div>
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" name="nom"   class="form-control" value="<?=$conducteur->getNom() ?>" id="nom">
  </div>
 
  <input type="hidden" name="id_conducteur" value="<?= $conducteur->getId_conducteur() ?>">
  <button class="container bold  btn btn-success p-2 " type="submit">Valider  </button>
</form>






<?php
// value="<?= $conducteur->getcouleur() 
$content = ob_get_clean();
$title = "Modification";
require_once "base.html.php";

?>