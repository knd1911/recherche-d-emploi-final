<?php 

$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
   or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

if (isset($_COOKIE['reset_token'])) {
    $token = $_COOKIE['reset_token'];
}

if (isset($_POST['submit'])) {
    $pass =sha1(md5($_POST['password'])); 
    
    $token = $_POST['token'];
    
    if(isset($_SESSION['renitialise_entreprise'])){
        $sql_password = mysqli_query($conn, "UPDATE entreprise SET password_entreprise = '{$pass}' WHERE email_entreprise IN (SELECT email FROM password_forget WHERE token = '{$token}')");
    
        if ($sql_password) {
            header('Location:/login');
        }
    }
    if(isset($_SESSION['renitialise_candidat'])){
            $sql_password = ("UPDATE candidat SET password = '{$pass}' WHERE email IN (SELECT email FROM password_forget WHERE token = '{$token}')");
        if ($sql_password) {
            header('Location:/login');
        }
    }

    // Mettre à jour le mot de passe dans la base de données
    //$sql_password = ("UPDATE candidat SET password = '{$pass}' WHERE email IN (SELECT email FROM password_forget WHERE token = '{$token}')");
    
}

?>

<div class="head">

    <form method="post">
    <h2>Réinitialiser le mot de passe</h2>

    <div class="input">
                <p class="titre">
                    Mot de passe *:               
                </p>
                <input type="password" name="password" placeholder="Entrez votre nouveau mot de passe" required>
            </div>
            <div class="input">
            <input type="hidden" name="token" value="<?php echo $token; ?>">   </div>
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