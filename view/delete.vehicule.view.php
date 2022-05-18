<?php
// On démarre une session
session_start();

// Est-ce que l'id_vehicule existe et n'est pas vid_vehiculee dans l'URL
if(isset($_GET['id_vehicule_vehicule']) && !empty($_GET['id_vehicule_vehicule'])){
    require_once('modele/Manager.php');

    // On nettoie l'id_vehicule envoyé
    $id_vehicule = strip_tags($_GET['id_vehicule']);

    $sql = 'SELECT * FROM `vehicule` WHERE `id_vehicule` = :id_vehicule;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id_vehicule)
    $query->bindValue(':id_vehicule', $id_vehicule, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();

    // On vérifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id_vehicule n'existe pas";
        header('Location: index.php');
        die();
    }

    $sql = 'DELETE FROM `vehicule` WHERE `id_vehicule` = :id_vehicule;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id_vehicule)
    $query->bindValue(':id_vehicule', $id_vehicule, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
    header('Location: index.php');


}else{
    $_SESSION['erreur'] = "URL invalid_vehiculee";
    header('Location: index.php');
}