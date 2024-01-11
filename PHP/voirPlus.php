<?php 

$id = (int)( $_GET['id']);


$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

$id = (int)$_GET['id'] ;

$jointure = "SELECT emploi.*, entreprise.*
FROM emploi
JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
WHERE id_emploi = {$id}";

$entreprises = mysqli_query($conn, "SELECT emploi.*, entreprise.*
FROM emploi
JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
WHERE id_emploi = {$id}");

$entreprise = $entreprises->fetch_assoc();
?>

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
        <p class="soustitre">competences requise :  <?=  $entreprise['competence'] ?></p>
    </div>
    <div class="bottom btn">
    <a href="/postuler?id=<?=$entreprise['id_emploi']?>">Postuler</a>
    </div>
   </div>
</div>


<style>
    .btn{
        display: flex;
        align-items: center;
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
    }
        .forms{
        display: flex;
        justify-content: center;
    }
    .form{
        display: flex;
        justify-content: center;
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