<?php 

require_once'PHP/function/auth.php';
forcer_utilisateur_connecte();

require_once 'PHP/function/couperPhrase.php';

define('PAR_PAGE', 3);

$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
$ent = (int)$_SESSION['entreprise'];


$postuler = mysqli_query($conn, "SELECT candidat.*, postuler.*, emploi.*
FROM postuler
JOIN candidat ON postuler.id_candidat = candidat.id_candidat
JOIN emploi ON postuler.id_emploi = emploi.id_emploi
WHERE postuler.id_entreprise = {$ent}
ORDER BY postuler.date_publication DESC
 ");



$sql = mysqli_query($conn, "SELECT emploi.*, entreprise.*
                            from emploi emploi
                            JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
                            where id_emploi = $id and emploi.id_entreprise= $ent
                            ");



?>

<div class="listes">
    <?php if (mysqli_num_rows($sql)>0):  ?>
        <div class="colonne">
            <?php foreach($sql as $offre) : ?>

                <a href="/offre/voirPlus?id=<?=$offre['id_emploi']?>" class="content">
                    
                    <div class="image">
                        <img src="image/<?=isset($offre['image']) ? $offre['image'] : $offre['logo_entreprise']?>" alt="">
                    </div>
                    <div class="details">
                        <p class="titre"> <?=$offre['poste']?> </p>
                        <p class="soustitre"><?= $offre['date_publication'] ." | ". $offre['nom_entreprise'] ?></p>
                        <p class="moyentitre">Description : <?=  couperPhrase($offre['Description'])?></p>
                        <p class="moyentitre">Competences : <?= couperPhrase($offre['competence'])?></p>
                        <p class="moyentitre">Localite : <?= $offre['localite']?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    </div>


    <?php if ((mysqli_num_rows($postuler) >0)):  ?>
<div class="border">
    <div class="head">
        <h3>Mes dernierres candidatures recues</h3>
    </div>
    <div class="listes">
  
        <div class="use">
            <?php foreach($postuler as $postule) : ?>

                <div class="contents">
                    
                    <div class="images">
                        <img src="/image/<?=$postule['image']?>" alt="">
                    </div>
                    <div class="details">
                        <h3>Poste : <?=$postule['poste']?> </h3>
                        <p class="soustitre">
                            <?= $postule['date_publication']?>

                        </p>
                        <p class="moyentitre">Nom : <?= $postule['nom_candidat']?></p>
                        <p class="moyentitre">Prenom : <?=$postule['prenom']?></p>
                        <p class="moyentitre">Numero : <?= $postule['numero']?></p>
                        <p class="moyentitre">Email : <?= $postule['email']?></p>
                    </div>
                    <div class="btn">
                    <a href="Profil?id=<?=$postule['id_candidat']?>">Voir le profil</a>
                </div>
                </div>
                
            <?php endforeach; ?>
        </div>
       
   

    </div>
            
</div>
<?php endif; ?>
<?php if((mysqli_num_rows($postuler)==0)):  ?> 
<div class="border">
    <div class="head"><h3>Mes dernierres candidatures recues</h3></div>
    
                <h3 >Vous n'avez pas encore recus de candidatures</h3>
           
</div>
<?php endif; ?> 



<style>


.listes{
        display: flex;
        justify-content: center;
        background-color: #999;
        border-radius: 20px;
        
        
    }
    a{
        text-decoration: none;
    }
   .colonne{
    display: block;
    
    width: 100%;
   }
   .use{
    display: flex;
    
    width: 100%;
   }
    .content{
        display: flex;
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
        width: 90%;
    }

    .contents{
        display: flex;
        flex-wrap: wrap;
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
        width: 362px;
    }
    .images{
        width: 280px;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
        border: 1px solid #ccc;
    }.images img{
        width: 275px;
        height: 250px; 
        border-radius: 10px;
    }
    .chiffre a{
    padding: 10px;
    color: #04202e;
    text-decoration: none;
    font-weight: 500;
    font-size: 20px;
    text-decoration: underline;
}
.chiffre .active{
    background-color: #f34545;
    border-radius: 3px;
    outline: none;
    border: none;
    font-size: 20px;
    font-weight: 600;
    color: #fff;
}
        .active{
        opacity: 1;
        font-size: 17px;
        padding: 17px;
    }
    .pagination{
        display: flex;
        margin: 20px;
        justify-content: space-around;
    }
     .pre a, .sui a{        
        text-decoration: none;
        background-color: #f34545;
        color: #fff;
        font-weight: 600;
        border: none;
        border-radius: 10px;
        color: #fff;
        font-size: 20px; 
        padding: 15px;

    }
     .listes{
        display: flex;
        justify-content: center;
        
        
    }
    a{
        text-decoration: none;
    }
   .colonne{
    display: block;
    
    width: 100%;
   }
    .content{
        display: flex;
        
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
        width: 90%;
    }
    .image{
        width: 140px;
        height: 140px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 20px;
        border: 1px solid #ccc;
    }img{
        width: 130px;
        height: 130px; 
        border-radius: 10px;
    }
    .details{
        margin-left: 40px;
    }
    .titre{
       
        font-size: 25px;
        color: #04202e;
        font-weight: 600;
    }
    .soustitre{
        
        font-size: 15px;
        color: #04202e;
        font-weight: 600;
    }
    .moyentitre{
     
        font-size: 15px;
        color: #04202e;
        font-weight: 600;
    }
</style>