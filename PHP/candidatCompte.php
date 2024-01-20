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

$postuler = mysqli_query($conn, "SELECT candidat.*, postuler.*
FROM postuler
JOIN candidat ON postuler.id_candidat = candidat.id_candidat
WHERE candidat.id_candidat = {$id_candidat}
ORDER BY date_publication DESC
LIMIT 3 ");


?>


<pre>
    <?= var_dump($postuler); ?>
</pre>
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
        <?php foreach($result as $name): ?>
        <h3>Nom: <?= $name['nom_candidat'] ?></h3>
        <h3>Prenom : <?= $name['prenom'] ?></h3>
        <h3>Email : <?= $name['email'] ?></h3>
        <h3>Telephone : <?= $name['numero'] ?></h3>
        <?php endforeach; ?>
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
<?php while ($row = $result->fetch_assoc()): 
        $formationData = json_decode($row['formation'], true);
        $expData = json_decode($row['exp_pro'], true);
        ?>
<div class="border">
    <div class="head">
        <h3>Mes criteres</h3>
    </div>
   
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
    <?php if(mysqli_num_rows($postuler)): ?>
                <section>
    <table>
            <tr>
                
                
                <th>Photo</th>
                <th>Nom et Prenom</th>

            </tr>
                <?php while($postule = $postuler->fetch_assoc()): ?>
            <tr>
                <td> <img  src="../image/<?= $postule['image'] ?>"> </td>
                <td>
                    <h3><?= $postule['nom_candidat'] ." ". $postule['prenom'] ?></h3>
                    <h4><?= $postule['numero'] ?></h4>

                    <h4><?= $postule['email'] ?></h4>
    
                </td>

            </tr> 
                <?php endwhile; ?>

        </table>
</section>
        <div class="btn">
    
            <a href="#">Gerer mes candidatures</a>
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
</style>