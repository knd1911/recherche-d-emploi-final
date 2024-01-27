<?php 



require_once 'PHP/function/auth.php';

$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

$id = (int)$_GET['id'] ;

$views = mysqli_query($conn, "UPDATE emploi
SET views = views + 1
WHERE id_emploi = {$id}");

$entreprises = mysqli_query($conn, "SELECT emploi.*, entreprise.*
FROM emploi
JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
WHERE id_emploi = {$id}");

$entreprise = $entreprises->fetch_assoc();
$id_entreprise = $entreprise['id_entreprise'];
$id_candidat = isset($_SESSION['candidat']) ? (int)$_SESSION['candidat'] : null;

if (isset($_POST["envoyer"])) {
    $deja = mysqli_query($conn, "SELECT * FROM postuler where id_emploi = {$id} and id_candidat = {$id_candidat}");

    if (mysqli_num_rows($deja)>0) {
        $erreur = "Vous ne pouvez pas postuler a cette offre d'emploi car vous avez deja postuler";
    } elseif ($_FILES['cv']['type'] == 'application/pdf') {
            $nomFichier = basename(mysqli_real_escape_string($conn, $_FILES['cv']['name']));
            $tmp_name = $_FILES['cv']['tmp_name'];
            $deplace = move_uploaded_file($tmp_name, "CV/" . $nomFichier);
            if ($deplace) {
                    $insert = mysqli_query($conn, "INSERT INTO postuler(id_emploi, id_candidat, id_entreprise, cv)
                    VALUES({$id}, {$id_candidat},{$id_entreprise}, '{$nomFichier}')");
                }
            } else {
                $erreur = "Erreur lors du téléversement du fichier.";
            }
        } else {
            $erreur = "Veuillez sélectionner un fichier PDF.";
    }




?>



<?= isset($erreur) ?  "<h2 style=\"text-align:center;\">$erreur</h2>" : null ?>
<?php if(isset($_SESSION['candidat'])): ?>
    <div class="btn">
        <button onclick="afficherModal()">Postuler</button>
    </div>
<?php elseif(isset($_SESSION['entreprise'])): ?>
    <p class="titre" style="text-align: center;">Vous ne pouver pas postuler a une offre d'emploi.</p>
    <p class="titre" style="text-align: center;">veuillez vous incrire en tant que candidat pour postuler</p>
<?php else: ?>
    <p class="titre" style="text-align: center;">Veuiller vous connecter pour postuler</p>
<?php endif;?>

<div class="border">
    <div class="head">
        <h3>Profil de l'entreprise</h3>
    </div>
    <div class="flex">
    <div class="bottom">
        <h3>Nom de l'entreprise : <?=  $entreprise['nom_entreprise'] ?></h3>
        <h3>Adresse : <?=  $entreprise['adresse_entreprise'] ?></h3>
        <h3>ville : <?=  $entreprise['ville'] ?></h3>
        <h3>Nom du contact : <?=  $entreprise['prenom'] ?></h3>
        <h3>Numero : <?=  $entreprise['numero'] ?></h3>
        <h3>Email : <?=  $entreprise['email_entreprise'] ?></h3>
    </div>
    <div class="bottom">
        <img src="../image/<?=  $entreprise['logo_entreprise'] ?>" alt="">
    </div>
    </div>
</div>  

<div class="border">
    <div class="head">
       <h3> Details sur l'offre d'emploi</h3>
    </div>
   <div class="flex">
   <div class="bottom">
        <p class="titre">
        Poste : <?=  $entreprise['poste'] ?>
        </p>
        <p class="soustitre">Date de publication : <?=  $entreprise['date_publication'] ?></p>
        <p class="soustitre">Type de contrat:  <?=  $entreprise['contrat'] ?></p>
        <p class="soustitre">Nombre(s) de place(s) : <?=  $entreprise['nombre'] ?></p>
        <p class="soustitre">Secteur d'activite : <?=  $entreprise['secteur_activite'] ?></p>
        <p class="soustitre">Localite : <?=  $entreprise['localite'] ?></p>
        <p class="soustitre">Niveau d'etude :  <?=  $entreprise['niveau'] ?></p>
        <p class="titre">competences requise : </p>
        <p class="soustitre"> <?=  $entreprise['competence'] ?></p>
        <p class="titre">Description : </p>
        <p class="soustitre"><?=  $entreprise['Description'] ?></p>
    </div>
    
   </div>
   
</div>
<?php if(isset($_SESSION['candidat'])): ?>
    <div class="btn">
        <button onclick="afficherModal()">Postuler</button>
    </div>
<?php elseif(isset($_SESSION['entreprise'])): ?>
    <p class="titre" style="text-align: center;">Vous ne pouver pas postuler a une offre d'emploi.</p>
    <p class="titre" style="text-align: center;">veuillez vous incrire en tant que candidat pour postuler</p>
<?php else: ?>
    <p class="titre" style="text-align: center;">Veuiller vous connecter pour postuler</p>
<?php endif;?>$_SESSION['entreprise']
    <div id="modal" class="border">
        <h2>Poste : <?=  $entreprise['poste'] ?></h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input">
            <p class="titre">Télécharger votre CV</p>
            <input type="file" name="cv" accept=".pdf" required>
            </div>
            <div class="btns">
            <input type="submit" name="envoyer" value="Envoyer">
            <button onclick="fermerModal()">Annuler</button>
            </div>
        </form>
        
    </div>

<style>
    .btn{
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }.btns{
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }
    .btn a{
        background-color: #f34545;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        opacity: 1;
        text-decoration: none;
        font-size: 30px;
        border-radius: 10px;
        padding: 20px;
        color: white;
        font-weight: 800;
    }.btn button{
        background-color: #f34545;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        opacity: 1;
        text-decoration: none;
        font-size: 30px;
        border-radius: 10px;
        padding: 20px;
        color: white;
        font-weight: 800;
    }.btns button{
        background-color: #f34545;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        opacity: 1;
        text-decoration: none;
        font-size: 25px;
        border-radius: 10px;
        padding: 10px;
        color: white;
        font-weight: 800;
    }
    .btns input{
        background-color: #04202e;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        opacity: 1;
        text-decoration: none;
        font-size: 25px;
        border-radius: 10px;
        padding: 10px;
        color: white;
        font-weight: 800;
    }
    .input input{
        width: 100%;
        background-color: rgba(255, 255, 255, .8);
        padding: 15px;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        font-size: 20px;
        border-radius: 10px;
        opacity: .6;
    }
    form{
        padding: 20px;
    }
        .forms{
        display: flex;
        justify-content: center;
    }
    .form{
        display: flex;
        justify-content: center;
    }
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
    .border{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 10px;
        margin: 20px;
        border-radius: 20px;
    }
    .flex{
        display: flex;
        justify-content: space-between;
    }
    .head{
        border-bottom: 1px solid #ccc;
        
    }h2{
        color: #f34545;
    }

    img{
      width: 280px;
      height: 280px;  
      border-radius: 20px;
      margin: 20px;
    }
    .titre{
       
       font-size: 25px;
       color: #04202e;
       font-weight: 600;
   }
   .soustitre{
       font-size: 18px;
       color: #04202e;
       font-weight: 600;
   }
    
</style>

<script>
        function afficherModal() {
            document.getElementById("modal").style.display = "block";
        }

        function fermerModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>