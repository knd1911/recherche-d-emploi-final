<?php 


function couperPhrase($phrase, $nombreDeMots = 19) {
    $mots = explode(" ", $phrase);
    if (count($mots) > $nombreDeMots) {
        $motsCoupes = array_slice($mots, 0, $nombreDeMots);
        $phraseCoupée = implode(" ", $motsCoupes);
        $phraseCoupée .= "...";

        return $phraseCoupée;
    } else {
        return $phrase;
    }
}



$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

$id = (int)$_SESSION['entreprise'] ;



$sql = mysqli_query($conn, "SELECT emploi.*, entreprise.*
                            from emploi emploi
                            JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
                            ORDER BY date_publication DESC");


?>
<div class="listes">
    <?php if (mysqli_num_rows($sql)>0):  ?>
        <div class="colonne">
            <?php foreach($sql as $offre) : ?>

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
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>





<style>
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