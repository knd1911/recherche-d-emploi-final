<?php 
require_once'PHP/function/auth.php';
forcer_utilisateur_connecte();
require_once 'PHP/config/config.php';
$niveau_etude = mysqli_query($conn, "SELECT * FROM niveau_etude");
?>



<div class="forms">
<div class="border">
<div class="head">
        <h3>Ma photo</h3>
    </div>
<div class="form">
   <div class="form" enctype="multipart/form-data">
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
            <input class="radio" type="radio" name="niveau" value="<?= $niv_etude['id_niveau_etude'] ?>" id=""><?= $niv_etude['niveau'] ?>
        <?php endforeach; ?>
    </div>
    
    <div style="border-bottom: 1px solid #ccc;"></div>
    <div class="bottom">
    <h3>Formation</h3>

    <form id="formFormation" style="background-color: #ccc;  border-radius: 10px; padding:10px;" method="post">
    <div class="formation-container">
        <div>
        <p class="titre">Titre:</p>
        <input style="width: 90%;margin:20px;"  type="text" name="titre[]">
        </div>

        <div style="display: flex;justify-content: space-around;">
        <p for="date_debut">Date de début:</p>
        <input type="month" name="date_debut[]">

        <p for="date_fin">Date de fin:</p>
        <input type="month" name="date_fin[]">

        <p>Aujourd'hui:
            <input type="radio" name="aujourdhui[]" value="1" onclick="toggleDateFin(this)">
        </p>
        </div>

        <p class="titre">Description:</p>
        <textarea name="description[]"></textarea>

        <div class="supression">
            <button type="button" onclick="supprimerFormation(this)">Supprimer</button>
        </div>
    </div>

    <button type="button" class="ajouter-formation-button" onclick="ajouterFormation()">Ajouter Formation</button>
    <div class="btn">
    <input type="submit" value="Enregistrer">
    </div>
</form>
    </div>
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
    .
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
        var formationContainer = document.querySelector('#formFormation .formation-container').cloneNode(true);
        formationContainer.querySelectorAll('input, textarea').forEach(function (element) {
            element.value = ""; // Réinitialise les valeurs
        });
        formationContainer.querySelector('[type="radio"]').addEventListener('click', function () {
            toggleDateFin(this);
        });

        formationContainer.querySelector('button').addEventListener('click', function () {
            supprimerFormation(this);
        });

        document.querySelector('#formFormation').appendChild(formationContainer);
    }

    function supprimerFormation(button) {
        var formationContainer = button.parentNode;
        if (document.querySelectorAll('.formation-container').length > 1) {
            formationContainer.parentNode.removeChild(formationContainer);
        } else {
            alert("Vous ne pouvez pas supprimer la seule formation.");
        }
    }
</script>
