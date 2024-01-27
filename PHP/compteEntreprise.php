<?php 
require_once'PHP/function/auth.php';
forcer_utilisateur_connecte();
$id = (int)$_SESSION['entreprise'];
require_once 'PHP/config/config.php';
$entreprises = mysqli_query($conn, "SELECT * FROM entreprise where id_entreprise = {$id}");
$entreprise = $entreprises->fetch_assoc();

require_once'PHP/function/couperPhrase.php';


   

$sql = mysqli_query($conn, "SELECT emploi.*, entreprise.*
FROM emploi
JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
WHERE entreprise.id_entreprise = {$id}
ORDER BY date_publication DESC
LIMIT 3");

$postuler = mysqli_query($conn, "SELECT candidat.*, postuler.*, emploi.*
FROM postuler
JOIN candidat ON postuler.id_candidat = candidat.id_candidat
JOIN emploi ON postuler.id_emploi = emploi.id_emploi
WHERE postuler.id_entreprise = {$id}
ORDER BY postuler.date_publication DESC
LIMIT 3 ");



?>



<div class="border">
    <div class="head">
        <h3>Mon profil</h3>
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
<?php if (mysqli_num_rows($sql)>0):  ?>
<div class="border">
    <div class="head">
        <h3>Mes dernierres annonces</h3>
    </div>
    <div class="listes">
  
        <div class="colonne">
            <?php foreach($sql as $offre) : ?>

                <a href="/offre/voirPlus?id=<?=$offre['id_emploi']?>" class="content">
                    
                    <div class="image">
                        <img src="image/<?=!empty($offre['image']) ? $offre['image'] : $offre['logo_entreprise']?>" alt="">
                    </div>
                    <div class="details">
                        <p class="titre"> <?=$offre['poste']?> </p>
                        <p class="soustitre">
                            <?= $offre['date_publication'] ." | ". $offre['nom_entreprise'] ?>

                        </p>
                        <p class="moyentitre">Description : <?=  couperPhrase($offre['Description'])?></p>
                        <p class="moyentitre">Competences : <?= couperPhrase($offre['competence'])?></p>
                        <p class="moyentitre">Localite : <?= $offre['localite']?></p>
    <h4><?= $offre['views'] ?> vue<?= $offre['views'] >1 ? 's' : ''  ?> </h4>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>
       
   

    </div>
            <div class="btn">
            <a href="gestion/annonce">Gerer mes offres d'emploi</a>
            </div> 
</div>
<?php endif; ?>
<?php if(mysqli_num_rows($sql)==0):  ?> 
<div class="border">
    <div class="head"><h3>Mes dernieres annonces</h3></div>
    
                <h3 >Vous n'avez pas encore poster une offre d'emploi</h3>
                <div class="btn">
            <a class="sub-btn" href="/gestion/annonce/publier">Publier une offre</a>
        </div>
           
</div>
<?php endif; ?> 
<?php if ((mysqli_num_rows($sql)>0 ) && (mysqli_num_rows($postuler) >0)):  ?>
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
<?php if((mysqli_num_rows($sql)>0) && (mysqli_num_rows($postuler)==0)):  ?> 
<div class="border">
    <div class="head"><h3>Mes dernierres candidatures recues</h3></div>
    
                <h3 >Vous n'avez pas encore recus de candidatures</h3>
           
</div>
<?php endif; ?>
<style>
        table{
    border-collapse: collapse;
    width: 100%;
    letter-spacing: 2px;
    font-weight: 400;
}
th{
    padding: 10px 0;
    font-weight: 400;
}
td{
    border-top: 0.5px solid #999;
    color: #04202e;
}
tr{
    border-bottom: 0.5px solid #999;
}

tr:nth-child(even) {
  color: #fff;
}
    .img img{
        width: 200px;
        height: 200px;
        border-radius: 20px;
        margin: 20px;
    }
    .cv{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 10px;
        margin: 20px;
        border-radius: 20px;
        text-align: center;
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
    .name{
        display: flex;
    }
    .input{
        padding: 05px;
        width: 100%;
    }
    select{
    background-color: rgba(255, 255, 255, .8);
    padding: 15px;
    outline: none;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0,0,0, .1);
    margin-left: 20px;
    font-size: 20px;
    border-radius: 10px;
    opacity: .6;
    }option{ 
        font-size: 18px;
    }
    input{
        background-color: rgba(255, 255, 255, .8);
        padding: 15px;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        margin-left: 20px;
        font-size: 20px;
        border-radius: 10px;
        opacity: .6;
    }
    .titre{
        margin: 25px;
        font-size: 25px;
        color: #04202e;
        font-weight: 600;
    }
    img{
      width: 280px;
      height: 280px;  
      border-radius: 20px;
      margin: 20px;
    }
    .btn{
        text-align: center;
        padding: 20px;
    }
    .btn a{
        text-decoration: none;
        background-color: #f34545;
        outline: none;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0,0,0, .1);
        opacity: 1;

        font-size: 20px;
        border-radius: 10px;
        padding: 10px;
        color: white;
        font-weight: 800;
    }.btn input:hover{
        background-color: #f34540;
        font-size: 25px;
    }
    .head{
        border-bottom: 1px solid #ccc;
        
    }h2{
        color: #f34545;
    }
    .oubli{
        text-align: center;
        margin-left: 25px;
    }
    .oubli:hover{
        text-decoration: underline;
    }


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
        display: block;
        
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
        width: 90%;
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