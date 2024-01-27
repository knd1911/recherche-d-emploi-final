<?php 
require_once'PHP/function/auth.php';
require_once 'PHP/function/couperPhrase.php';

forcer_utilisateur_connecte();
$id_candidat = (int)$_GET['id'];
require_once 'PHP/config/config.php';
$candidats = mysqli_query($conn, "SELECT * FROM candidat where id_candidat = {$id_candidat}");
$candidat = $candidats->fetch_assoc();


$sql_select = "SELECT * FROM candidat WHERE id_candidat = {$id_candidat}";
$results = mysqli_query($conn,$sql_select);

$sql_selects = "SELECT * FROM candidat WHERE id_candidat = {$id_candidat}";
$result = mysqli_query($conn,$sql_selects);

$postuler = mysqli_query($conn, "SELECT emploi.*, postuler.*, entreprise.*
FROM postuler
JOIN entreprise ON postuler.id_entreprise = entreprise.id_entreprise
JOIN emploi ON emploi.id_emploi = postuler.id_emploi
WHERE id_candidat = {$id_candidat}");

$cvs = mysqli_query($conn, "SELECT  postuler.cv FROM postuler
WHERE id_candidat = {$id_candidat}");
$cv = $cvs->fetch_assoc();

$status = mysqli_query($conn, "SELECT  status FROM postuler
WHERE id_candidat = {$id_candidat}");
$stat = $status->fetch_assoc();

if(isset($_POST['accepter'])){
    $accepter = mysqli_real_escape_string($conn, $_POST['accepter']);
    $update = mysqli_query($conn, "UPDATE postuler SET status = '{$accepter}' WHERE id_candidat = {$id_candidat}");
    if($update){
        header("Location: /candidatures/Profil?id={$id_candidat}");
    }
}

if(isset($_POST['rejetter'])){
    $rejetter = mysqli_real_escape_string($conn, $_POST['rejetter']);
    $update = mysqli_query($conn, "UPDATE postuler SET status = '{$rejetter}' WHERE id_candidat = {$id_candidat}");
    if($update){
        header("Location: /candidatures/Profil?id={$id_candidat}");
    }
}





?>


<div class="forms">
<div><div class="border">
<div class="head">
        <h3>identifiant et coordonnees</h3>
    </div>
<div class="form">
    
    <div class="img">
        <img src="../image/<?= $candidat['image'] ?>" alt="">
    </div>
    <div class="element">
        <?php foreach($results as $name): ?>
        <h3>Nom: <?= $name['nom_candidat'] ?></h3>
        <h3>Prenom : <?= $name['prenom'] ?></h3>
        <h3>Email : <?= $name['email'] ?></h3>
        <h3>Telephone : <?= $name['numero'] ?></h3>
        <?php endforeach; ?>
    </div>
</div>
</div></div>

<?php while ($row = $result->fetch_assoc()): 
        $formationData = json_decode($row['formation'], true);
        $expData = json_decode($row['exp_pro'], true);
        ?>
<div class="border">
    <div class="head">
        <h3>Criteres</h3>
    </div>
    
            <div style="display: flex;justify-content:space-between;">
               
                <div>
                <div class="">
             <h1>Formation</h1>
             <?php foreach ($formationData as $formation): ?>
                <h3>Titre : <?=$formation['titre'][0]?></h3>
                <h3>Date de debut <?= $formation['date_debut'][0] ?></h3>
                <h3>Date de fin <?= $formation['date_fin'][0] ?></h3>
                <h3>Description <?= $formation['description'][0] ?></h3>
            <?php endforeach; ?>
            </div>
            <div>
            <h1>Experience profesionelle</h1>
        <?php foreach ($expData as $exp): ?>
                <h3>Titre : <?=  $exp['titre'][0]?></h3>
        <h3>Date de debut <?= $exp['date_debut'][0] ?></h3>
        <h3>Date de fin <?= $exp['date_fin'][0] ?></h3>
        <h3>Description <?= $exp['description'][0] ?></h3>
            <?php endforeach; ?>
        </div>
                </div>

                <div>
                    <h1>Niveau d'etude</h1>
                    <h2><?= $row['id_niveau_etude'] ?></h2>

                    <h1>Niveau d'experience</h1>
                    <h2><?= $row['id_exp'] ?></h2>

                    <h1>Domaine de metier</h1>
                    <h2><?= $row['id_metier'] ?></h2>

                </div>
            </div>
    <?php endwhile;?>
      

    <div class="btn">
        <button onclick="afficherModal()">Afficher le CV</button>
        </div>
</div>
<?php if(isset($stat['status']) && $stat['status'] != 'Dossier rejeté' && $stat['status'] != 'Dossier accepté'): ?>
    <div>
    <form action="" method="post">
    <div class="cant">
        <div class="btns">
            <input type="submit" name="rejetter" value="Dossier rejetter">
        </div>
        <div class="btn">
        <input type="submit" name="accepter" value="Dossier accepter">
        </div>
        </div>
    </form>
    </div>
<?php else: ?>
    <h3 style="text-align: center;">Vous avez accepter cet dossier</h3>
<?php endif; ?>
    




        <div id="modal" class="border">
        <div class="embed-container">
        <embed src="CV/<?= $cv['cv']?>" type="application/pdf" />
    </div>
            <div class="btns">
            <button onclick="fermerModal()">Fermer</button>
            </div>
</div>
<script>
        function afficherModal() {
            document.getElementById("modal").style.display = "block";
        }

        function fermerModal() {
            document.getElementById("modal").style.display = "none";
        }
    </script>
<style>
    .cant{
        display: flex;
        justify-content: center;
    }
    .cant .btn input{
        padding: 10px;
        background-color: #04202e;
        color: #fff;
    }
    .cant .btns input{
        padding: 10px;
        background-color: #f34540;
        color: #fff;
        margin: 20px;
       
    }
    #modal{
        display: none;
    }
            .embed-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 90%; 
        }

        .embed-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
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
        justify-content: center;
    }
    .form{
        width: 50%;
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
    .btn button{
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