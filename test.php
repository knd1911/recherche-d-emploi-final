<?php
$id = (int)($_GET['id']);

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
        $deplace = move_uploaded_file($tmp_name, "CV/" . $nomFichier);
        if ($deplace) {
            echo "Le fichier a été téléversé avec succès.";
        } else {
            echo "Erreur lors du téléversement du fichier.";
        }
    } else {
        echo "Veuillez sélectionner un fichier PDF.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire dans un Pop-up</title>
    <style>
        /* Style pour la fenêtre modale */
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <!-- Bouton déclencheur -->
    <button onclick="afficherModal()">Ouvrir le formulaire</button>

    <!-- Fenêtre modale (pop-up) -->
    <div id="modal">
        <h2>Formulaire</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Ajoutez vos champs de formulaire ici -->
            <p class="titre">Télécharger votre CV</p>
            <input type="file" name="cv" accept=".pdf" required>
            <input type="submit" name="envoyer" value="Envoyer">
        </form>
        <button onclick="fermerModal()">Fermer</button>
    </div>

    <!-- Script JavaScript pour afficher et masquer la fenêtre modale -->
    <script>
        function afficherModal() {
            document.getElementById("modal").style.display = "block";
        }

        function fermerModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>

</body>
</html>
