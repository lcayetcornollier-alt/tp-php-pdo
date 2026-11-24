<?php
/*
  TP 5 – AJOUTER, MODIFIER, SUPPRIMER AVEC exec()

  1. Ajouter le jeu Pac-Man (genre Action, année 1980, note 16)
     puis afficher : Pac-Man ajouté avec l'id ...
  2. Passer la note de Fortnite à 15
     puis afficher le nombre de jeux modifiés.
  3. Supprimer Pac-Man
     puis afficher le nombre de jeux supprimés.

  Vérifier le résultat avec la page du TP 3.

  Question : que se passerait-il avec DELETE FROM jeu sans WHERE ?
  Réponse : tout la table serait suprimer 
*/
require 'connexion.php';

        $resultat = $base->query("INSERT INTO jeu (titre, genre, annee, note) VALUES ('Pac-Man','Action',1980, 16)");
        // Préparation de la requête avec les marqueurs
   if ($resultat == FALSE) {
      echo "<p>Echec de l'exécution de la requête.</p>"; 
   }
   else {

      $id = $base->lastInsertId();

      echo "Pac-Man ajouté avec l'id:".$id;
   }


      $sql = "UPDATE jeu SET note = 15 WHERE titre = 'Fortnite'";
      // Préparation de la requête avec les marqueurs
      $nombre = $base->exec($sql);
      echo '<p>nombre de note fortine modifier: '.$nombre.'</p>';

      $sql= "DELETE FROM jeu WHERE titre = 'Pac-Man'";
      $nombre = $base->exec($sql);
      echo '<p>mobre de pac-man suprimer: '.$nombre.'</p>';
?>
