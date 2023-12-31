<?php
$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
   or die("La connexion à la base de données a échoué : " . mysqli_connect_error());


//echo "Connexion réussie à la base de données.";


?>