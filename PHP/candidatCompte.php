<?php 
require_once'PHP/function/auth.php';
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
$result = mysqli_query($conn,$sql_select);


?>



<div class="forms">
<div class="border">
<div class="head">
        <h3>identifiant et coordonnees</h3>
    </div>
<div class="form">
    
    <div class="img">
        <img src="../image/<?= $candidat['image'] ?>" alt="">
    </div>
    <div class="element">
        <h3>Nom: KOUANDA</h3>
        <h3>Prenom : Achraf</h3>
        <h3>Email : kouandaachraf01@gmail.com</h3>
        <h3>Adresse : Ouagadougou, somgande</h3>
        <h3>Nationalite: Burkinabe</h3>
    </div>
</div>
</div>
<div class="cv">
    <?php if (!$profilComplet):?>
    <div class="head">
        <h3>completez votre profil</h3>
    </div>
    <h2>Veuillez completez votre profil pour continuer</h2>
    <h2><a href="update">cliquez ici</a></h2>

<?php else:?>

    <div class="head">
        <h3>Vos Information</h3>
    </div>
    <h2 style="color: green;">Votre profil est a jour</h2>
    <h2><a href="update">cliquez ici pour modifier vos criteres</a></h2>

<?php endif; ?>
</div>
</div>
<div class="border">
    <div class="head">
        <h3>Mes criteres</h3>
    </div>
    <?php while ($row = $result->fetch_assoc()): 
        $formationData = json_decode($row['formation'], true);
        $expData = json_decode($row['exp_pro'], true);
        ?>
            <div style="display: flex;justify-content:space-between;">
               
                <div>
                <div class="">
             <h1>Vos formation</h1>
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
                <h3>Titre : <?=$exp['titre'][0]?></h3>
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

                    <h1>type de contrat</h1>
                    <h2><?= $row['type_contrat'] ?></h2>
                </div>
            </div>
    <?php endwhile;?>

</div>
<div class="border">
    <div class="head">
        <h3>Suivie des candidatures</h3>
    </div>
    <h3>vous n'avez pas envoyer de candidature</h3>
    <div class="btn">
    
            <a href="#">Gerer mes candidatures</a>
        </div>
</div>
<style>
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
</style>