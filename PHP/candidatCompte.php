<?php 
require_once'PHP/function/auth.php';
forcer_utilisateur_connecte();

?>



<div class="forms">
<div class="border">
<div class="head">
        <h3>identifiant et coordonnees</h3>
    </div>
<div class="form">
    
    <div class="img">
        <img src="../image/profile.jpeg" alt="">
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
    <div class="head">
        <h3>completez votre profil</h3>
    </div>
    <h2>Veuillez completez votre profil pour continuer</h2>
    <h2><a href="update">cliquez ici</a></h2>
</div>
</div>
<div class="border">
    <div class="head">
        <h3>Nos suggestions d´offres d´emploi pour vous</h3>
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