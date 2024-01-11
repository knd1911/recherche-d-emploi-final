<?php 
 
 $serveur = "localhost"; 
 $nomUtilisateur = "test";
 $motDePasse = "MyP@ssw0rd123";
 $nomBaseDeDonnees = "emploi";
 
 $conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees);

 $rg = mysqli_query($conn, 'SELECT * from zone_geo');
 $sql = mysqli_query($conn, 'SELECT * from secteur_activite');
 $id = (int)$_SESSION['entreprise'] ?? null;

 

?>

<link rel="stylesheet" href="CSS/accueil.css">
<div class="recherche">
<form action="" method="post">
<div class="search">
    <div class="input">
    <div class="div">
        <select name="metier" id="" required>
            <option>Choisir un secteur d'activite a rechercher</option>
     <?php   while($metiers = $sql->fetch_assoc()) :?>

    <option value="<?=$metiers['dsc_secteur_activite'] ?>"><?=$metiers['dsc_secteur_activite']?></option>

<?php endwhile;?>
        </select>
    </div>
    <div class="div">
    <select name="region" id="" required>
            <option value=""> La Region</option>
            <?php   while($region = $rg->fetch_assoc()) :?>

                <option value="<?=$region['lieu']?>"><?=$region['lieu']?></option>

            <?php endwhile;?>
        </select>
    </div>
    <input type="submit" name="rechercher" value="Rechercher">
    </div>
</div>
</div>
            </form  >
<?php if(!empty($_POST['region']) && !empty($_POST['metier'])): 
    
    $ville = mysqli_escape_string($conn, $_POST['region']);
    $dsc = mysqli_escape_string($conn, $_POST['metier']);

$requet = mysqli_query($conn, "SELECT emploi.*, entreprise.*
                            from emploi emploi
                            JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
                            where localite = '{$ville}' AND secteur_activite = '{$dsc}'
                            ORDER BY date_publication DESC");
    
    ?>

<div class="listes">
    <?php if (mysqli_num_rows($sql)>0):  ?>
        <div class="colonne">
            <?php foreach($requet as $offre) : ?>

                <a href="/offre/voirPlus?id=<?=$offre['id_emploi']?>" class="content">
                    
                    <div class="image">
                        <img src="image/<?=$offre['image']?>" alt="">
                    </div>
                    <div class="details">
                        <p class="titre"> <?=$offre['poste']?> </p>
                        <p class="soustitre"><?= $offre['date_publication'] ." | ". $offre['nom_entreprise'] ?></p>
                        <p class="moyentitre">Description : <?= $offre['Description']?></p>
                        <p class="moyentitre">Competences : <?= $offre['competence']?></p>
                        <p class="moyentitre">Localite : <?= $offre['localite']?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
            <?php if(mysqli_num_rows($requet)==0):  ?>
                <h1 style="text-align: center;" >Aucun resultat trouver</h1>
                
            <?php endif; ?>
<?php endif; ?>
<script src="JS/accueil.js"></script>
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