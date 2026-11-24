<!--
  TP 8 – MODIFIER ET SUPPRIMER

  1. Formulaire « Modifier » : changer la note du jeu qui a cet id.
     Afficher « Note modifiée. » ou « Aucun jeu modifié. »
  2. Formulaire « Supprimer » : supprimer le jeu qui a cet id.
     Afficher « Jeu supprimé. » ou « Aucun jeu supprimé. »
  3. En bas de page, afficher la liste des jeux, à jour : 1 - Minecraft (18/20)

  Utiliser des requêtes préparées.
  Test : essayer de modifier le jeu avec l'id 999.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 8 - Modifier et supprimer</title>
</head>
<body>
<?php

?>

    <h2>Modifier une note</h2>
    <form method="post">
        Id : <input type="number" name="id_modif" required>
        Nouvelle note : <input type="number" name="note" min="0" max="20" required>
        <button type="submit">Modifier</button>
    </form>

    <h2>Supprimer un jeu</h2>
    <form method="post">
        Id : <input type="number" name="id_suppr" required>
        <button type="submit">Supprimer</button>
    </form>

    <h2>Liste des jeux</h2>
<?php
require 'connexion.php';
if(isset($_POST['note']) && isset($_POST['id_modif'])){
    $id = $_POST['id_modif'];
    $newnote = $_POST['note'];

    $sql = "UPDATE jeu SET note = ? WHERE id = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($newnote, $id));
 
    if($resultat->rowCount() == 0){

        echo "<p> Aucun jeu modifié</p>";
    }else{

 

   $resultat = $base->query("SELECT titre FROM jeu WHERE id =".$id);
        // Préparation de la requête avec les marqueurs
     
        while ($ligne = $resultat->fetch()){
                  echo "<p> Note modifiée ".$ligne['titre'].": ".$newnote."</p>";  
        }

    }
    
}

if(isset($_POST['id_suppr'])){
    $id = $_POST['id_suppr'];

    $sql = "DELETE FROM jeu WHERE id = ?";
    $resultat = $base->prepare($sql);
    $resultat->execute(array($id));
    
    if($resultat->rowCount() == 0){

        echo "<p> aucun jeu supprimé.</p>";
    }else{

        echo "<p> Jeu supprimé.</p>";
    }
}
?>
</body>
</html>
