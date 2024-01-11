<?php 
require_once 'PHP/function/auth.php';
forcer_utilisateur_connecte();
require_once 'PHP/config/config.php';
$niveau_etude = mysqli_query($conn, "SELECT * FROM niveau_etude");
$expereinces = mysqli_query($conn, "SELECT * FROM experience");
$regions = mysqli_query($conn, "SELECT * FROM zone_geo");
$metiers = mysqli_query($conn, "SELECT * FROM metier");
$contrat = mysqli_query($conn, "SELECT * FROM contrat");
$activites = mysqli_query($conn, "SELECT * FROM secteur_activite");


if(isset($_POST['submit'])){

    $niveau = $_POST['niveau'];
    $formation_titre = $_POST['titre_formation'];
    $formation_lieux = $_POST['ecole_formation'];
    $formation_date_debut = $_POST['date_debut_formation'];
    $formation_date_fin = $_POST['date_fin_formation'];
    $formation_description = $_POST['description'];
    $exp = $_POST['Ex'];
    $nom_post = $_POST['nomPost'];
    $entreprise = $_POST['nom_entreprise'];
    $exp_date_debut = $_POST['date_debut_exp'];
    $exp_date_fin = $_POST['date_fin_exp'];
    $exp_description = $_POST['description_exp'];
    $id_metier = $_POST['metier'];
    $id_region = $_POST['region'];
    $type_contrat = $_POST["contrat"];

    $id_candidat = (int)$_SESSION['candidat'];
    $sql_select = "SELECT * FROM candidat WHERE id_candidat = {$id_candidat}";
    $result_select = mysqli_query($conn, $sql_select);

    if (isset($_FILES["image"])) {
           
        
        $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];


            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $retour =  move_uploaded_file($tmp_name,"image/".$img_name);
                    if($retour) {
                        
                        if ($result_select) {
                            $row = $result_select->fetch_assoc();
                            $formations_json = $row['formation'];
                            $expereinces_json = $row['exp_pro'];
                            // Ajouter la nouvelle formation au tableau JSON
                            $formations_array = json_decode($formations_json, true) ?: [];
                            $experiences_array = json_decode($expereinces_json, true) ?: [];
                            $nouvelle_formation = [
                                'titre' => $formation_titre,
                                'date_debut' => $formation_date_debut,
                                'date_fin' => $formation_date_fin,
                                'description' => $formation_description
                            ];
                            $nouvelle_exp = [
                                'titre' => $nom_post,
                                'date_debut' => $exp_date_debut,
                                'date_fin' => $exp_date_fin,
                                'description' => $exp_description
                            ];
                            $formations_array[] = $nouvelle_formation;
                            $experiences_array[] = $nouvelle_exp;
                    
                            // Mettre à jour la base de données avec le nouveau tableau JSON
                            $formations_json_updated = (json_encode($formations_array));
                            $exp_json_updated = (json_encode($experiences_array));
                            $sql_update = "UPDATE candidat SET image ='{$img_name}', id_niveau_etude='{$niveau}', formation = '{$formations_json_updated}', exp_pro = '{$exp_json_updated}',
                                                                id_exp = '{$exp}', id_metier = '{$id_metier}', type_contrat = '{$type_contrat}'
                            WHERE id_candidat = {$id_candidat}";
                             
                           $result_update = mysqli_query($conn,$sql_update);
                    
                            if ($result_update) {
                               header("location:/compte");
                            } else {
                                echo "Erreur lors de la mise à jour de la base de données : " . $conn->error;
                            }
                        } else {
                            echo "Erreur lors de la récupération des données actuelles : " . $conn->error;
                        }


                    } else {
                        echo"donnees non poster";
                    }
            }
        
        } 


}





?>

<form action="" method="post" enctype="multipart/form-data">
<div class="forms">
<div class="border">
<div class="head">
        <h3>Ma photo</h3>
    </div>
<div class="form">
   <div class="form" >
    <input type="file" name="image" id="">
   </div>
</div>
</div>
<div class="cv">
    <div class="head">
        <h3>completez votre profil</h3>
    </div>
    <h3>Veuillez remplir tous les champs</h3>
</div>
</div>
<div class="border">
    <div class="head">
        <h3>Mon profil</h3>
    </div>
    <div class="bottom">
        <h3>Niveau d'etudes *:</h3>
        <?php foreach ($niveau_etude as $niv_etude): ?>
            <input class="radio" type="radio" required name="niveau" value="<?= $niv_etude['niveau'] ?>" id=""><?= $niv_etude['niveau'] ?>
        <?php endforeach; ?>
    </div>
    
    <div style="border-bottom: 1px solid #ccc;"></div>
<div class="bottom">
    <h3>Formation</h3>
    <div class="formation-container" style="background-color: #ccc;  border-radius: 10px; padding:10px;">
        <div style="display: flex; justify-content:space-between;">
        <div style="width: 100%;"  >
        <p class="titre">Titre de la formation:</p>
        <input style="width: 90%;margin:20px;"  type="text" name="titre_formation[]" required>
        </div>
        <div style="width: 100%;"  >
        <p class="titre">Nom de l'école ou de l'établissement</p>
        <input style="width: 90%;margin:20px;"  type="text" name="ecole_formation[]" required>
        </div>
        </div>

        <div style="display: flex;justify-content: space-around;">
        <p for="date_debut">Date de début:</p>
        <input type="month" name="date_debut_formation[]" required>

        <p for="date_fin">Date de fin:</p>
        <input type="month" name="date_fin_formation[]" required>

        
        </div>

        <p class="titre">Description:</p>
        <textarea name="description[]" required></textarea>

            <button type="button" class="sup" onclick="supprimerFormation(this)">Supprimer</button>
        
    </div>
    <button type="button" class="ajouter-formation-button ajout" onclick="ajouterFormation()">Ajouter une Formation</button>

    </div>
    <div style="border-bottom: 1px solid #ccc;"></div>

    <div class="bottom">
    <h3>Niveau d'experience * :</h3>
    <?php foreach ($expereinces as $experience): ?>
            <input class="radio" type="radio" required name="Ex" value="<?= $experience['experience'] ?>" id=""><?= $experience['experience'] ?>
        <?php endforeach; ?>
    </div>
    <div style="border-bottom: 1px solid #ccc;"></div>
    <div class="bottom">
    <h3>Experience Professionnelle *:</h3>
    <div class="exp-container" style="background-color: #ccc;  border-radius: 10px; padding:10px;">
        <div style="display: flex; justify-content:space-between;">
        <div style="width: 100%;"  >
        <p class="titre">Intitule du poste:</p>
        <input style="width: 90%;margin:20px;"  type="text" name="nomPoste[]">
        </div>
        <div style="width: 100%;"  >
        <p class="titre">Nom de l'entreprise</p>
        <input style="width: 90%;margin:20px;"  type="text" name="nom_entreprise[]">
        </div>
        </div>

        <div style="display: flex;justify-content: space-around;">
        <p for="date_debut">Date de début:</p>
        <input type="month" name="date_debut_exp[]">

        <p for="date_fin">Date de fin:</p>
        <input type="month" name="date_fin_exp[]">
        </div>

        <p class="titre">Description:</p>
        <textarea name="description_exp[]"></textarea>

            <button type="button" class="sup" onclick="supprimerExp(this)">Supprimer</button>
        
    </div>
    <button type="button" class="ajouter-formation-button ajout" onclick="ajouterExp()">Ajouter une Experience profesionnelle</button>

    </div>
    <div class="select">
    <div class="bottom" id="regionsSelectionnes">
        <h3>Localité :</h3>
        <h4>si vous n'avez pas de preferences ne pas faire un choix</h4>
        <select name="region" id="">
            <option value="">Region</option>
            <?php   while($region = $regions->fetch_assoc()) :?>

                <option value="<?=$region['lieu']?>"><?=$region['lieu']?></option>

            <?php endwhile;?>
        </select>
    </div>
    <div class="bottom" id="metiersSelectionnes">
        <h3>Choisir vos metiers * :</h3>
        <select name="metier" id="">
            <?php   while($metier = $metiers->fetch_assoc()) :?>
                <option value="<?=$metier['description_metier']?>"><?=$metier['description_metier']?></option>
                <?php endwhile;?>
        </select>
        
    </div>
    </div>
    <div class="bottom">
        <h3>Type de contract *:</h3>
        <?php foreach ($contrat as $contracts): ?>
            <input class="radio" type="radio" required name="contrat" value="<?= $contracts['type'] ?>" id=""><?= $contracts['type'] ?>
        <?php endforeach; ?>
        </div>
</div>
<div class="btn">
    <input type="submit" name="submit" value="Envoyer">
</div>
</form>
<style>
        .select{
            display: flex;
            justify-content: space-between;
        }
        
    .sup{
        padding: 10px;
        background-color: #fff;
        color: red;
        font-size: 20px;
        outline: none;
        border: none;
        border-radius: 20px;
        margin-top: 20px;
    }
    .ajout{
        padding: 10px;
        background-color: #f34545;
        color: #fff;
        font-size: 20px;
        outline: none;
        border: none;
        border-radius: 20px;
        margin-top: 20px;
    }
    .radio{
        font-size: 20px;
        background-color: #f34545;
    }
    .bottom{
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
    textarea{
        width: 90%;
        height: 100px;
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
    }.btn input{
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
    }
</style>

<script>
    function toggleDateFin(radio) {
        var dateFinInput = radio.parentNode.parentNode.querySelector('[name="date_fin[]"]');
        dateFinInput.disabled = radio.checked;
        if (radio.checked) {
            dateFinInput.value = ""; // Réinitialise la valeur si aujourd'hui est sélectionné
        }
    }

    function ajouterFormation() {
        var formationContainer = document.querySelector('.formation-container').cloneNode(true);
        formationContainer.querySelectorAll('input, textarea').forEach(function (element) {
            element.value = ""; // Réinitialise les valeurs
        });
        

        formationContainer.querySelector('button').addEventListener('click', function () {
            supprimerFormation(this);
        });

        document.querySelector('.formation-container').appendChild(formationContainer);
    }

    function supprimerFormation(button) {
        var formationContainer = button.parentNode;
        if (document.querySelectorAll('.formation-container').length > 1) {
            formationContainer.parentNode.removeChild(formationContainer);
        } else {
            alert("Vous ne pouvez pas supprimer la seule formation.");
        }
    }

    function ajouterExp() {
        var formationContainer = document.querySelector('.exp-container').cloneNode(true);
        formationContainer.querySelectorAll('input, textarea').forEach(function (element) {
            element.value = ""; // Réinitialise les valeurs
        });
       

        formationContainer.querySelector('button').addEventListener('click', function () {
            supprimerExp(this);
        });

        document.querySelector('.exp-container').appendChild(formationContainer);
    }

    function supprimerExp(button) {
        var formationContainer = button.parentNode;
        if (document.querySelectorAll('.exp-container').length > 1) {
            formationContainer.parentNode.removeChild(formationContainer);
        } else {
            alert("Vous ne pouvez pas supprimer la seule formation.");
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
    var metiersSelectionnes = document.getElementById("regionsSelectionnes");

    // Fonction pour ajouter une region
    window.ajouterRegion = function () {
        var nouvelleRegionSelect = document.querySelector('select[name="region[]"]');
        var regionSelectionne = nouvelleRegionSelect.value;
        if (regionSelectionne) {
            // Crée un nouvel élément div pour afficher la region sélectionné
            var divRegion = document.createElement('div');
            divRegion.innerHTML = regionSelectionne + " <button type='button' onclick='supprimerRegion(this)'>Supprimer</button>";

            // Ajoute le nouvel élément à la section des regions sélectionnés
            regionsSelectionnes.appendChild(divRegion);

            // Réinitialise la liste déroulante pour la prochaine sélection
            nouvelleRegionSelect.value = "";
        }
    }
    window.supprimerRegion = function (element) {
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer la region '" + element.previousSibling.textContent.trim() + "' ?");
        if (confirmation) {
            element.parentNode.remove();
        }
    };
});

document.addEventListener("DOMContentLoaded", function () {
    var metiersSelectionnes = document.getElementById("metiersSelectionnes");

    // Fonction pour ajouter un métier
    window.ajouterMetier = function () {
        var nouveauMetierSelect = document.querySelector('select[name="metier[]"]');
        var metierSelectionne = nouveauMetierSelect.value;

        if (metierSelectionne) {
            // Crée un nouvel élément div pour afficher le métier sélectionné
            var divMetier = document.createElement('div');
            divMetier.innerHTML = metierSelectionne + " <button type='button' onclick='supprimerMetier(this)'>Supprimer</button>";

            // Ajoute le nouvel élément à la section des métiers sélectionnés
            metiersSelectionnes.appendChild(divMetier);

            // Réinitialise la liste déroulante pour la prochaine sélection
            nouveauMetierSelect.value = "";
        }
    };

    // Fonction pour supprimer un métier
    window.supprimerMetier = function (element) {
        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer le métier '" + element.previousSibling.textContent.trim() + "' ?");
        if (confirmation) {
            element.parentNode.remove();
        }
    };
});



</script>
