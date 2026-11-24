<!--
  TP 3 – LISTER LES JEUX DANS UN TABLEAU HTML

  Afficher tous les jeux dans le tableau ci-dessous, une ligne par jeu.
  La note s'affiche sur 20 : 18/20
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 3 - Liste des jeux</title>
</head>
<body>
    <h1>Liste des jeux</h1>

    <table border="1">
        <tr><th>Titre</th><th>Genre</th><th>Année</th><th>Note</th></tr>
        <?php
        require 'connexion.php';
        
        $resultat = $base->query("SELECT titre, genre, annee, note FROM jeu ORDER BY id ASC");
        // Préparation de la requête avec les marqueurs
        
        while ($ligne = $resultat->fetch()){

        echo '<tr><th>'.$ligne['titre'].'</th><th>'.$ligne['genre'].'</th><th>'.$ligne['annee'].'</th><th>'.$ligne['note'].'</th></tr>';
        }
        ?>
    </table>
</body>
</html>
