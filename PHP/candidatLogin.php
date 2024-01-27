    <?php 
    require_once'PHP/function/auth.php';

    if (est_connect()) {
        header('location:/');
    }
    require_once 'PHP/config/config.php';

    if(isset($_POST['submit'])){
        $civilite = $_POST['civilite'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $pass = sha1(md5($_POST['password']));
        $Cpass = sha1(md5($_POST['Cpassword']));
        if($pass === $Cpass){
            $entrepise = mysqli_query($conn, "SELECT email_entreprise FROM entreprise where email_entreprise='{$email}'");
            $candidat = mysqli_query($conn, "SELECT email FROM candidat where email = '{$email}'");
            if(mysqli_num_rows($entrepise) > 0 || mysqli_num_rows($candidat) > 0 ){
                $erreur = "cet email existe deja";
            }else{
                $candidat_insert = mysqli_query($conn, "INSERT into candidat (civilite, nom_candidat, prenom, numero, email, password) 
        value('{$civilite}', '{$nom}', '{$prenom}', {$numero}, '{$email}', '{$pass}')");
                if($candidat_insert){
                    $_SESSION['inscrit'] = 'reussit';
                    header('location:login');
                }
            }
        }else{
            $erreur = 'vos mot de passe ne se corresponde pas';
        }
        
    }
    
    
   ?> 

    
    <form action="" method="POST">
        <div class="head">
        <h3 <?php if(isset($erreur)): ?>
           style="display: none;"
        <?php endif; ?>
        
        >Inscription </h3>
        <?php if(isset($erreur)): ?>
            <h2><?=$erreur?></h2>
        <?php endif; ?>
        </div>
        <div class="name">
            <div class="input">
                <p class="titre">
                    Civilité *:              
                </p>
                <select name="civilite" id="">
                    <option value="">Choisir votre civilite</option>
                    <option value="Mr">Monsieur</option>
                    <option value="Mme">Madame</option>
                </select>
            </div>    
            <div class="input">
                <p class="titre">
                    Prenom *:               
                </p>
                <input type="name" name="prenom" value="<?= isset($_POST['prenom']) ? $_POST['prenom'] : null ?>" required placeholder="Entrez votre prenom">
            </div>
            <div class="input">
                <p class="titre">
                    Nom *:               
                </p>
                <input type="name" name="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : null ?>" required placeholder="Entrez votre nom">
            </div>
            <div class="input">
                <p class="titre">
                    Numero *:               
                </p>
                <input type="number" name="numero" value="<?= isset($_POST['numero']) ? $_POST['numero'] : null ?>" required placeholder="Entrez votre numero">
            </div>
         </div>
        <div class="name">
        <div class="input">
                <p class="titre">
                    Email *:               
                </p>
                <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : null ?>" required placeholder="Entrez votre email">
            </div>
            <div class="input">
                <p class="titre">
                    Mot de passe *:               
                </p>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="input">
                <p class="titre">
                 Confirmer :              
                </p>
                <input type="password" name="Cpassword" placeholder="Confirmer votre mot de passe" required>
            </div>
        </div>
        <div class="btn">
            <input type="submit" name="submit" value="Je m'inscris">
        </div>
    </form>
<style>
    form{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
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
</style>