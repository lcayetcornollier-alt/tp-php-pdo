<!--
  TP 6 – RECHERCHE PAR GENRE AVEC UNE REQUÊTE PRÉPARÉE

  Quand l'utilisateur choisit un genre et valide :
  1. Afficher le nombre de jeux trouvés : 2 jeu(x) trouvé(s) :
  2. Afficher chaque jeu de ce genre : Mario Kart 8 : 17/20
  La recherche doit utiliser une requête préparée.

  Test : taper dans l'URL  ?genre=x' OR '1'='1
  Que se passe-t-il ? Pourquoi ?
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 6 - Recherche par genre</title>
</head>
<body>

    <form method="get">
        <select name="genre">
            <option>Action</option>
            <option>Aventure</option>
            <option>Course</option>
            <option>Réflexion</option>
            <option>Sport</option>
        </select>
        <button type="submit">Rechercher</button>
    </form>

<?php
require 'connexion.php';
if(isset($_GET['genre'])){

    $genre = $_GET['genre'];

$sql = "SELECT titre, note FROM jeu WHERE genre = ?";
$resultat = $base->prepare($sql);
$resultat->execute(array($genre));
echo '<p>'.$resultat->rowCount().' jeu(x) trouvé(s)</p>';

while ($ligne = $resultat->fetch()){

    echo '<p>'.$ligne['titre'].' : '.$ligne['note'].'/20</p>';
}}

?>
</body>
</html>
