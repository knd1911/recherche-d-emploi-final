<?php 
session_start();

if (isset($_POST['deconn'])) {
    session_destroy();
    header("Location:/");
}if (isset($_POST['site'])) {
    header("Location:/");
}

require_once 'function/auth.php';
       
require_once 'config/config.php';
require_once 'function/compteur_vues.php';

forcer_admin_connecte();



$entrepise = mysqli_query($conn, "SELECT id_entreprise FROM entreprise");
$candidat = mysqli_query($conn, "SELECT id_candidat FROM candidat");
$emploi = mysqli_query($conn, "SELECT id_emploi FROM emploi");
$candidature = mysqli_query($conn, "SELECT id_postuler FROM postuler");

$entrepises = count($entrepise->fetch_all());
$candidats = count($candidat->fetch_all());
$emplois = count($emploi->fetch_all());
$candidatures = count($candidature->fetch_all());

for ($i=0; $i < 10; $i++) { 
    $annes = date('Y') + $i;
   $annee[] = <<<HTML
    <a class="salut" href="">$annes</a> 
HTML;
}

?>

<form action="" method="POST">
    <input class="btns" type="submit" name="site" value="Voir le site">
    <input class="btn" type="submit" name="deconn" value="Deconnexion">
</form>

<div class="total">
    <div class="nombre">
        <p class="titre">Totals des chercheurs d'emploi</p>
        <h2><?= $candidats?></h2>
    </div>
    <div class="nombre">
        <p class="titre">Totals des entreprises</p>
        <h2><?= $entrepises?></h2>
    </div>
    <div class="nombre">
        <p class="titre">Totals d'emploi publier</p>
        <h2><?= $emplois?></h2>
    </div>
    <div class="nombre">
        <p class="titre">Totals des candidatures</p>
        <h2><?= $candidatures?></h2>
    </div>
    <div class="nombre">
        <p class="titre">Totals des vues</p>
        <h2><?= getTotalVues($conn) ?></h2>
    </div>
</div>

<div class="anne">
    <?php foreach($annee as $ane): ?>
        <h2><?= $an ?></h2>
    <?php endforeach; ?>
</div>



<style>
    body{
        background-color: #04202e;
    }
    form{
        display: flex;
        justify-content: space-between;
    }.btn{
        background-color: #f34545;
        padding: 10px;
        border: none;
        font-size: 20px;
        border-radius: 10px;
    }
    .btns{
        background-color: #04202e;
        color: #fff;
        text-decoration: underline;
        padding: 10px;
        border: none;
        font-size: 20px;
        border-radius: 10px;
    }
    .nombre{
        background-color: #fff;
        padding: 20px;
        border-radius: 20px;
        width: 200px;
        text-align: center;
    }h2{
        text-align: center;
    }
    .total{
        display: flex;
        justify-content: space-around;
    }
    
</style>