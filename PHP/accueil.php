<?php 


require_once 'PHP/function/couperPhrase.php';

define('PAR_PAGE', 3);

$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

require_once 'function/compteur_vues.php';


incrementerCompteur($conn);

$id = isset($_SESSION['entreprise']) ? (int)$_SESSION['entreprise'] : null;


$emploi_count = mysqli_query($conn, "SELECT id_emploi From emploi");
$count_id = count($emploi_count->fetch_all());
$count = (int)$count_id;
$page = (int)($_GET['page'] ?? 1);
$offset= ($page-1) * PAR_PAGE;


$pages = ceil($count / PAR_PAGE);






$sql = mysqli_query($conn, "SELECT emploi.*, entreprise.*
                            from emploi emploi
                            JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
                            ORDER BY date_publication DESC limit ".PAR_PAGE . " OFFSET $offset");



?>
<div class="listes">
    <?php if (mysqli_num_rows($sql)>0):  ?>
        <div class="colonne">
            <?php foreach($sql as $offre) : ?>

                <a href="/offre/voirPlus?id=<?=$offre['id_emploi']?>" class="content">
                    
                    <div class="image">
                        <img src="image/<?=!empty($offre['image']) ? $offre['image'] : $offre['logo_entreprise']?>" alt="">
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

<div class="pagination">
    <?php if($pages > 1 && $page > 1 ): ?>
        <div class="pre">
        <a href="?page=<?= $_GET["page"]=$page - 1?>">Precedent</a>
        </div>
    <?php endif; ?>
    <div class="chiffre">
    <?php for($i=1; $i<=$pages; $i++ ): ?>
                <a href="?page=<?=$i?>" <?= $i===$page ? 'class="active"' : '' ?>><?= $i ?></a>
    <?php endfor; ?>
    </div>
    <?php if($pages > 1 && $page < $pages): ?>
        <div class="sui">
        <a href="?page=<?=$_GET["page"]=$page + 1?>">Suivant</a>
        </div>
    <?php endif; ?>
    </div>


<style>
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