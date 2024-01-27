<?php

function incrementerCompteur($conn) {
    $dateActuelle = date("Y-m-d");

    $resultat = mysqli_query($conn, "SELECT * FROM compteur_vue WHERE date='$dateActuelle'");

    if (mysqli_num_rows($resultat) > 0) {
        mysqli_query($conn, "UPDATE compteur_vue SET compteur = compteur + 1 WHERE date='$dateActuelle'");
    } else {
        mysqli_query($conn, "INSERT INTO compteur_vue (date, compteur) VALUES ('$dateActuelle', 1)");
    }
}

function getCompteur($conn, $date) {
    $resultat = mysqli_query($conn, "SELECT compteur FROM compteur_vue WHERE date='$date'");

    if (mysqli_num_rows($resultat) > 0) {
        $row = mysqli_fetch_assoc($resultat);
        return $row['compteur'];
    } else {
        return 0;
    }
}


function getTotalVues($conn) {
  $resultat = mysqli_query($conn, "SELECT SUM(compteur) AS total_vues FROM compteur_vue");

if ($resultat->num_rows > 0) {
  $row = $resultat->fetch_assoc();
  return $row['total_vues'];
} else {
  return 0;
}
}

?>
