    <?php 
    require_once'PHP/function/auth.php';

    if (est_connect()) {
        header('location:/');
    }
    require_once 'PHP/config/config.php';

    $sect_activite = mysqli_query($conn, "SELECT * FROM `secteur_activite`");

    if(isset($_POST['submit'])){

        $nom_ent = $_POST['nom_ent'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $code_poste = $_POST['code_poste'];
        $site = $_POST['site'];
        $activite =$_POST['activite'];
        $desc =$_POST['desc'];
        
        $poste = $_POST['poste'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $pass = sha1(md5($_POST['password']));
        $Cpass = sha1(md5($_POST['Cpassword']));
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
                if($pass === $Cpass){
                    $entrepise = mysqli_query($conn, "SELECT email_entreprise FROM entreprise where email_entreprise='{$email}'");
                    $candidat = mysqli_query($conn, "SELECT email FROM candidat where email = '{$email}'");

                    if(mysqli_num_rows($entrepise) > 0 || mysqli_num_rows($candidat) > 0 ){
                        $erreur = "cet email existe deja";
                    }else{
                        $select = "INSERT INTO `entreprise` (`nom_entreprise`, `adresse_entreprise`, `email_entreprise`, `password_entreprise`, `logo_entreprise`, `site`, ville, `code_postal`, `nom`, `prenom`, `fonction`, `numero`)
                        VALUES('{$nom_ent}', '{$adresse}', '{$email}', '{$pass}', '{$img_name}', '{$site}', '{$ville}', {$code_poste}, '{$nom}', '{$prenom}', '{$poste}', {$numero}) ";
                    $entrepise_insert = mysqli_query($conn, $select);
                        if($entrepise_insert){
                            header('location:login');
                        }
                    }
                }else{
                    $erreur = 'vos mot de passe ne se corresponde pas';
                }
            }
        }
    }}
    
    
   ?> 
    <pre>
        <?= var_dump($img_name) ?>
    </pre>
    
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="head">
        <h3 <?php if(isset($erreur)): ?>
           style="display: none;"
        <?php endif; ?>
        
        >Inscription </h3>
        <?php if(isset($erreur)): ?>
            <h2><?=$erreur?></h2>
        <?php endif; ?>
        </div>
       <div class="form">
       <div class="head">
        <h1
        
        >Votre entreprise </h1>

        </div>
        <div class="name">  
            <div class="input">
                <p class="titre">
                    Nom *:               
                </p>
                <input type="name" name="nom_ent" value="<?= $nom_ent ?: null ?>" required placeholder="Entrez  le nom de l'entreprise">
            </div>
            <div class="input">
                <p class="titre">
                    Adresse *:               
                </p>
                <input type="adress" name="adresse" value="<?= $adress ?: null ?>" required placeholder="Entrez l'adresse de l'entreprise">
            </div>

         </div>
        <div class="name">
        <div class="input">
                <p class="titre">
                    ville *:               
                </p>
                <input type="text" name="ville" value="<?= $ville ?: null ?>" required placeholder="Entrez la ville">
            </div>
            <div class="input">
                <p class="titre">
                    code postal:               
                </p>
                <input type="number" name="code_poste" value="<?= $code_poste ?: null ?>" >
            </div>
            <div class="input">
                <p class="titre">
                    Site web de l'entreprise:               
                </p>
                <input type="text" name="site" value="<?= $site ?: null ?>" placeholder="Entrez la ville">
            </div>
        </div>
        <div class="input">
                <p class="titre">
                    Logo de l'entreprise :               
                </p>
                <input type="file" name="image" value="<?= $logo ?: null ?>">
            </div>
       </div>


        <div class="form">
            <div class="head">
                <h1>Description de l'entreprise</h1>
            </div>
            <h3>Secteur activite</h3>
            <div style="display: flex;flex-wrap: wrap;justify-content:space-between;">
            <select name="activite" id="">
                <?php while($sect = $sect_activite->fetch_assoc()): ?>
                    
                        <option  value="<?=$sect['dsc_secteur_activite']?>" id=""><?=$sect['dsc_secteur_activite']?></option>
                   
                <?php endwhile; ?>
            </select>
            </div>
            <div>
                <h3>Description</h3>
                <textarea name="desc" id=""></textarea>
            </div>
        </div>


       <div class="form">
            <div class="head">
                <h1>Vos identifiants</h1>
            </div>
            <div class="name">
                <div class="input">
                <p class="titre">
                    Nom *:               
                </p>
                <input type="name" name="nom" value="<?= $nom ?: null ?>" required placeholder="Entrez votre nom">

                </div>
                <div class="input">
                <p class="titre">
                    Prenom *:               
                </p>
                <input type="name" name="prenom" value="<?= $prenom ?: null ?>" required placeholder="Entrez votre prenom">

                </div>
                <div class="input">
                <p class="titre">
                    numero *:               
                </p>
                <input type="number" name="numero" value="<?= $numero ?: null ?>" required placeholder="Entrez votre numero">

                </div>
            </div>

            <div class="post">
                <p class="titre">
                    Fonction *:               
                </p>
                <input type="name" class="post" name="poste" value="<?= $poste ?: null ?>" required placeholder="Entrez votre poste">

                </div>

           <div class="name">
           <div class="input">
                <p class="titre">
                    Email *:               
                </p>
                <input type="email" name="email" value="<?= $email ?: null ?>" required placeholder="Entrez votre email">
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
       </div>
        <div class="btn">
            <input type="submit" name="submit" value="Je m'inscris">
        </div>
    </form>
<style>
    .post{
        width: 99%;
    }.post input{
        width: 100%;
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
    .form{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
    }
    textarea{
        width: 99%;
        height: 100px;
        border-radius: 20px;
        outline: none;
        border: 1px solid #ccc;
    }
    .name{
        display: flex;
        
    }
    .input{
        padding: 05px;
        width: 100%;
    }
    select{
    width: 100%;
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
   .input input{
        width: 100%;
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