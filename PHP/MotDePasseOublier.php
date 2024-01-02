<?php 

require_once 'PHP/config/config.php';


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $entrepise = mysqli_query($conn, "SELECT email_entreprise FROM entreprise where email_entreprise='{$email}'");
    $candidat = mysqli_query($conn, "SELECT email FROM candidat where email = '{$email}'");
        if(mysqli_num_rows($candidat) > 0 ){
            $token = bin2hex(random_bytes(16));
            $entrepise_token = mysqli_query($conn, "INSERT INTO `password_forget` (`email`, `token`)
                              VALUES ('{$email}', '{$token}')");

           setcookie('reset_token', $token, time() + 3600, '/', '', true, true);
            header("Location:renitialise");
            exit;

        }elseif(mysqli_num_rows($candidat) > 0 ){
            echo "cet email existe deja";
        }else{
            $erreur = "";
        }
}

?>

<div class="head">

    <form method="post">
    <h2>Mot de passe oublier</h2>

        <div class="input">
        <p class="titre">Adresse e-mail :</p>
        <input type="email" name="email" required>
        </div>
        <div class="btn">
            <input type="submit" name="submit" ></input>
        </div>
    </form>

</div>

<style>
    h2{
        text-align: center;
    }
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