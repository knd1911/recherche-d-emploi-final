<?php
require_once'PHP/function/auth.php';

    require_once 'PHP/config/config.php';
if (est_connect()) {
    header('location:/');
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = sha1(md5($_POST['password']));
    $entrepise = mysqli_query($conn, "SELECT * FROM entreprise where email_entreprise='{$email}'");
    $candidat = mysqli_query($conn, "SELECT * FROM candidat where email = '{$email}'");
        if(mysqli_num_rows($entrepise) > 0 ){
            $row = mysqli_fetch_assoc($entrepise);
            $bd_pass = $row['password_entreprise'];
            if ($pass === $bd_pass) {
            //var_dump($pass === $bd_pass);
            session_start();
                $_SESSION["entreprise"] = $row['id_entreprise'];
                header('location:entreprise/compte');
            }else{
                $erreur = 'vos identifiant sont incorrect';
            }
        }elseif(mysqli_num_rows($candidat) > 0 ){
            $row = mysqli_fetch_assoc($candidat);
            $bd_pass = $row['password'];
            if ($pass === $bd_pass) {
                session_start();
                $_SESSION["candidat"] = $row['id_candidat'];
                header('location:utilisateur/compte');
            }else{
                $erreur = 'vos identifiant sont incorrect';
            }
        }else{
            $erreur = "vos identifiant sont incorrect";
        }
    }


?>
<div class="form">
<form action="" method="post">
<div class="head">
        <h3 <?php if(isset($erreur)): ?>
           style="display: none;"
        <?php endif; ?>
        
        >Connexion </h3>
        <?php if(isset($erreur)): ?>
            <h2><?=$erreur?></h2>
        <?php endif; ?>
        </div>
<div class="input">
                <p class="titre">
                    Email *:               
                </p>
                <input type="email" name="email" value="<?= isset($_POST['email'] )? $_POST['email'] : null ?>" required placeholder="Entrez votre email">
            </div>
            <div class="input">
                <p class="titre">
                    Mot de passe *:               
                </p>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
        <a href="oublier" class="oubli">Mot de passe oublier?</a>

            <div class="btn">
            <input type="submit" name="submit" value="Se connecter">
        </div>
</form>
</div>
<style>
    .form{
        display: flex;
        justify-content: center;
    }
    form{
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
    .btn input{
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
        display: flex;
        justify-content: center;
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