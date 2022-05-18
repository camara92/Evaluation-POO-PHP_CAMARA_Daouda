<?php
// require_once("Game.php");


require_once("modele/VehiculeManager.php");


$vehiculeManager = new VehiculeManager();

$vehiculeManager->loadVehicule();

$vehicules = $vehiculeManager->getVehicule();




$vehiculeManager->loadVehicule();


ob_start();
//var_dump($_SERVER);
?>

<table class="table  table-hover text-center shadow">
  <thead class="bg-primary text-white">

    <tr>
      <th scope="col">Identifiant </th>
      <th scope="col">Marque </th>
      <th scope="col">Modele </th>
      <th scope="col">Couleur</th>
      <th scope="col">Immatriculation </th>

      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($vehicules as $vehicule) : ?>
      <tr>
        <td><?= $vehicule->getId_vehicule() ?></td>
        <td><?= $vehicule->getMarque() ?></td>
        <td><?= $vehicule->getModele() ?></td>
        <td><?= $vehicule->getCouleur() ?></td>
        <td><?= $vehicule->getImmatriculation() ?></td>
        <td><a href="<?= URL ?>vehicules/edit/<?=$vehicule->getId_vehicule() ?>"><i class="fa-solid fa-edit"></i></a></td>
        <td><a href="<?= URL ?>vehicules/delete"><i class="fa-solid fa-trash"></i></a></td>

      </tr>
    <?php endforeach; ?>
  </tbody>


</table>


<a class="btn btn-success w-25 d-block m-auto" href="<?= URL ?>vehicules/add">Ajouter un véhicule </a>

<?php

$content = ob_get_clean();
$title = "Nos véhicules  ";
require_once "base.html.php";

?>