<?php

$id = (int)( $_GET['id']);


$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

if (isset($_POST["envoyer"])) {
    if ($_FILES['cv']['type'] == 'application/pdf') {

        $nomFichier = basename($_FILES['cv']['name']);
        $tmp_name = $_FILES['cv']['tmp_name'];
        //$deplace = move_uploaded_file($tmp_name, "CV/".$nomFichier );
        if ($deplace) {
            echo "Le fichier a été téléversé avec succès.";
        } else {
            echo "Erreur lors du téléversement du fichier.";
        }
    } else {
        echo "Veuillez sélectionner un fichier PDF.";
    }
}
$contenuFichier = file_get_contents($_FILES['cv']['tmp_name']);

echo $contenuFichier;
           

    

?>
<!--embed src="CV/extrait de naissance légaliser.pdf" width="800px" height="600px" type="application/pdf" !-->

<pre>
    <pre><?=var_dump($_FILES)?></pre>
</pre>
<form action="" method="post" enctype="multipart/form-data">
    <p class="titre">Telecharger votre CV</p>
    <input type="file" name="cv" accept=".pdf" required>
    <input type="submit" name="envoyer" value="Envoyer">
</form>
