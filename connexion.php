<?php
/*
  CONNEXION.PHP
  Recopier ici le code de connexion du TP 1, sans le message "Connexion réussie !".
  Ce fichier sera inclus dans les TP 2 à 9 avec : require 'connexion.php';
*/
$base = new PDO('mysql:host=127.0.0.1;dbname=ludotheque', 'root', '');
$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
