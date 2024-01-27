<?php 
require_once'PHP/function/auth.php';
require_once 'PHP/function/couperPhrase.php';

forcer_utilisateur_connecte();
$id_candidat = (int)$_SESSION['candidat'];
require_once 'PHP/config/config.php';
$candidats = mysqli_query($conn, "SELECT * FROM candidat where id_candidat = {$id_candidat}");
$candidat = $candidats->fetch_assoc();
$profilComplet = true;
$colonnes = ["{$candidat['id_niveau_etude']}", "{$candidat['formation']}", "{$candidat['exp_pro']}", "{$candidat['id_exp']}", "{$candidat['id_metier']}", "{$candidat['type_contrat']}"];
foreach($colonnes as $colonne){
    if(empty($colonne)){
        $profilComplet = false;
        break;
    }
}

$sql_select = "SELECT * FROM candidat WHERE id_candidat = {$id_candidat}";
$results = mysqli_query($conn,$sql_select);

$sql_selects = "SELECT * FROM candidat WHERE id_candidat = {$id_candidat}";
$result = mysqli_query($conn,$sql_selects);

$postuler = mysqli_query($conn, "SELECT emploi.*, postuler.*, entreprise.*
FROM postuler
JOIN entreprise ON postuler.id_entreprise = entreprise.id_entreprise
JOIN emploi ON emploi.id_emploi = postuler.id_emploi
WHERE id_candidat = {$id_candidat}
ORDER BY postuler.date_publication DESC
LIMIT 3");


?>

<div class="border">
    <div class="head">
        <h3>Suivie des candidatures</h3>
    </div>
    <?php if(mysqli_num_rows($postuler)): ?>
        <div class="colonne">
            <?php foreach($postuler as $offre) : ?>

                <a href="/offre/voirPlus?id=<?=$offre['id_emploi']?>" class="content">
                    
                    <div class="image">
                        <img src="image/<?=$offre['logo_entreprise']?>" alt="">
                    </div>
                    <div class="details">
                        <p class="titre"> <?=$offre['poste']?> </p>
                        <p class="soustitre"><?= $offre['date_publication'] ." | ". $offre['nom_entreprise'] ?></p>
                        <p class="moyentitre">Description : <?=  couperPhrase($offre['Description'])?></p>
                        <p class="moyentitre">Competences : <?= couperPhrase($offre['competence'])?></p>
                        <p class="moyentitre">Localite : <?= $offre['localite']?></p>
                        <p class="titre">Status : <?= $offre['status']?></p>
                    </div>
                </a>
                
            <?php endforeach; ?>
        </div>
    <?php else: ?>
    <h3>vous n'avez pas encore postuler a une offre d'emploi</h3>
<?php endif; ?>
    
</div>

<style>
    .element{
        margin: 25px;
    }
    .img img{
        width: 190px;
        height: 180px;
        border-radius: 20px;
        margin: 20px;
        border: 2px solid #ccc;
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
    h3{
        
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