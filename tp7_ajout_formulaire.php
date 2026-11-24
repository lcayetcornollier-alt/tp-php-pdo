<!--
  TP 7 – FORMULAIRE D'AJOUT

  Quand le formulaire est envoyé :
  1. Ajouter le jeu dans la base avec une requête préparée
     (marqueurs nommés : :titre, :genre, :annee, :note).
  2. Afficher : Jeu ajouté ! Son id est : ...
  3. Afficher un lien vers la liste des jeux (tp3_liste.php).

  Test : ajouter le jeu Assassin's Creed. Est-ce que ça fonctionne ?
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP 7 - Ajouter un jeu</title>
</head>
<body>
    <h1>Ajouter un jeu</h1>

    <form method="post">
        <p>Titre : <input type="text" name="titre" required></p>
        <p>Genre : <input type="text" name="genre" required></p>
        <p>Année : <input type="number" name="annee" required></p>
        <p>Note : <input type="number" name="note" min="0" max="20" required></p>
        <button type="submit">Ajouter</button>
    </form>

<?php
require 'connexion.php';

if(isset($_POST['titre']) && isset($_POST['genre']) && isset($_POST['genre']) && isset($_POST['note'])){
$titre = $_POST['titre'];
$genre = $_POST['genre'];
$annee = $_POST['annee'];
$note = $_POST['note'];


$sql = "INSERT INTO jeu (titre, genre, annee, note) VALUES (?,?,?,?)";
$resultat = $base->prepare($sql);
$resultat->execute(array($titre, $genre, $annee, $note));
$id = $base->lastInsertId();
echo '<p>Jeu ajouté ! Son id est :'.$id.'</p>';
echo '<a href="http://localhost/tp-php-pdo/tp3_liste.php">voir</a>';
}


?>
</body>
</html>
