<?php




ob_start();
//var_conducteur($_SERVER);
//php str_replace conducteurt à chercher conducteurt a conducteurlacer et dans la phrase où chercher 

?>

<table class="table  table-hover text-center shadow">
  <thead class="bg-pconducteurry text-black">

    <tr>
    <th scope="col">identifiants</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
   
    <?php foreach ($conducteurs as $conducteur) : ?>
      <tr>
        <td><?= $conducteur->getId_conducteur() ?></td>
        <td><?= $conducteur->getPrenom() ?></td>
        <td><?= $conducteur->getNom() ?></td>
        <td><a href="<?=URL ?>conducteurs/edit/<?= $conducteur->getId_conducteur() ?>"><i class="fa-solid fa-edit"></i></a></td>
        <!-- <td><a href="<?=URL ?>conducteurs/delete"><i class="fa-solid fa-trash"></i></a></td> -->
        <td>
          <form action="<?= URL ?>conducteurs/delete/<?= $conducteur->getId_conducteur() ?>" method="post"
          onsubmit="return confirm('Êtes-vous certain de vouloir supprimer ce conducteur ? ')">
            <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>
 

</table>


<a class="btn btn-success w-25 d-blocconducteurauto" href="<?= URL ?>conducteurs/add">Ajouter un conducteur</a>

<?php

$content = ob_get_clean();
$title = "Liste des conducteurs";
require_once "base.html.php";

?>

