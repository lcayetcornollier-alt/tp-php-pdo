<?php
/*
  TP 9 – BONUS : MINI-APPLICATION

  Réunir sur une seule page :
  1. Un titre avec le nombre de jeux : Ma ludothèque (10 jeux)
     (dans le <title> et dans le <h1>)
  2. Un tableau de tous les jeux, du mieux noté au moins bien noté.
  3. Un lien « Supprimer » sur chaque ligne :
     tp9_bonus_ludotheque.php?supprimer=ID
  4. Un formulaire d'ajout de jeu (comme au TP 7).

  Les titres et genres affichés doivent être protégés.
  Test : ajouter un jeu dont le titre est <b>Test</b>. Que voit-on ?
*/
require 'connexion.php';
$resultat = $base->query("SELECT titre, genre, annee, note FROM jeu ORDER BY id DESC");
$nombre = $resultat->rowCount();
if(isset($_GET['supprimer'])){
            $sql = "DELETE FROM jeu WHERE id = ?";
            $resultat = $base->prepare($sql);
            $resultat->execute(array($_GET['supprimer']));
        }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ma ludothèque</title>
</head>
<body>
    <h1>Ma ludothèque <?php echo 'nombre: '.$nombre;   ?></h1>

    <table border="1">
        <tr><th>Titre</th><th>Genre</th><th>Année</th><th>Note</th><th></th></tr>
        <?php

        
       
        if(isset($_POST['titre']) && isset($_POST['genre']) && isset($_POST['annee']) && isset($_POST['note'])  ){
            $req = $base->prepare('INSERT INTO jeu (titre, genre, annee, note) VALUES (:titre, :genre, :annee, :note)');
            $req->execute( array("titre"=> $_POST['titre'], "genre" => $_POST['genre'], "annee" => $_POST['annee'], "note" => $_POST['note']));
            // $req = $base->prepare('INSERT INTO jeu (titre, genre, annee, note) VALUES (?, ?, ?, ?)');
            // $req->execute(array($_POST['titre'], $_POST['genre'], $_POST['annee'], $_POST['note']));
        }
         $resultat = $base->query("SELECT titre, genre, annee, note , id FROM jeu ORDER BY id DESC");
        // Préparation de la requête avec les marqueurs
        
        while ($ligne = $resultat->fetch()){

        echo '<tr><th>'.$ligne['titre'].'</th><th>'.$ligne['genre'].'</th><th>'.$ligne['annee'].'</th><th>'.$ligne['note'].'</th><th><a href="?supprimer='.$ligne['id'].'">suprimer</a></th></tr>';
        }
        ?>
    </table>

    <h2>Ajouter un jeu</h2>
    <form method="post">
        <p>Titre : <input type="text" name="titre" required></p>
        <p>Genre : <input type="text" name="genre" required></p>
        <p>Année : <input type="number" name="annee" required></p>
        <p>Note : <input type="number" name="note" min="0" max="20" required></p>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
