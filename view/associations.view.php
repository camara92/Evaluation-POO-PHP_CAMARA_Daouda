<?php




ob_start();
//var_conducteur($_SERVER);
//php str_replace conducteurt à chercher conducteurt a conducteurlacer et dans la phrase où chercher 

?>

<table class="table  table-hover text-center shadow">
  <thead class="bg-pconducteurry text-black">

    <tr>
    <th scope="col">Identifiant associations </th>
      <th scope="col">identifiant véhicule</th>
      <th scope="col">identifiant conducteur</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
   
    <?php foreach ($associations as $association) : ?>
      <tr>
        <td><?= $association->getId_association() ?></td>
        <td><?= $association->getId_vehicule() ?></td>
        <td><?= $association->getId_conducteur() ?></td>
        <td><a href="<?=URL ?>associations/edit"><i class="fa-solid fa-edit"></i></a></td>
        <!-- <td><a href="<?=URL ?>associations/delete"><i class="fa-solid fa-trash"></i></a></td> -->
        <td>
          <form action="<?= URL ?>associations/delete/<?= $association->getId_association() ?>" method="post"
          onsubmit="return confirm('Êtes-vous certain de vouloir supprimer ce véhicule ? ')">
            <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>
 

</table>


<a class="btn btn-success w-25 d-blocconducteurauto p-2" href="<?= URL ?>associations/add">Ajouter une association</a>

<?php

$content = ob_get_clean();
$title = "Liste des associations";
require_once "base.html.php";

?>

