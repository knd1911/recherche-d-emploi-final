<?php 

$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";


$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
   or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

$contrats = mysqli_query($conn, "SELECT * FROM contrat");
$activites = mysqli_query($conn, "SELECT * FROM secteur_activite");
$niveau_etudes = mysqli_query($conn, "SELECT * FROM niveau_etude");
$regions = mysqli_query($conn, "SELECT * FROM zone_geo");

$id_emploi=isset($_GET['id']) ? (int)$_GET['id'] : null;


if(isset($_POST['submit'])){
    $titre = mysqli_escape_string($conn, $_POST['titre']);
    $nombre = $_POST['nombre'];
    $type_contrat = $_POST['contrat'];
    $secteur = $_POST['secteur'];
    $niveau = mysqli_escape_string($conn, $_POST['niveau']);
    $competences = mysqli_escape_string($conn, $_POST['competences']);
    $localite = mysqli_escape_string($conn, $_POST['region']);
    $description = mysqli_escape_string($conn, $_POST['description']);

    if (isset($_FILES["image"])) {
           
        
        $img_name = $_FILES['image']['name'];
            $img_type = $_FILES['image']['type'];
            $tmp_name = $_FILES['image']['tmp_name'];


            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if(in_array($img_ext, $extensions) === true){
                $retour =  move_uploaded_file($tmp_name,"image/".$img_name);
                if($retour){
                    echo "image bien deplace";
                }
            }
    }

    $id = (int)$_SESSION['entreprise'];

    $ajouts =mysqli_query($conn, "INSERT INTO emploi(id_entreprise, `poste`, `contrat`, `nombre`, `Description`, `competence`, `localite`, `image`, `secteur_activite`, `niveau`)
    VALUES({$id}, '{$titre}', '{$type_contrat}', '{$nombre}', '{$description}', '{$competences}', '{$localite}', '{$img_name}', '{$secteur}', '{$niveau}')");
    var_dump($ajouts);
    if($ajouts){
        header('Location:/gestion/annonce');
    }

}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form">
        <div class="head">
            <?php if(isset($_GET['id'])): ?>
        <h3>Modifier cette annonce</h3>

            <?php else:?>
        <h3>Publier une annonces</h3>
        <?php endif; ?>
        </div>
        <div class="name">
        <div class="post">
            <p class="titre">
                Titre *:
            </p>
            <input type="text" name="titre" value="<?= (isset($_GET['id']))?$select['poste']:null ?>" placeholder="Le titre du poste rechecher" required>
        </div>
        <div class="post" style="margin-left:10px;max-width: 400px;">
            <p class="titre">
                Nombre *:
            </p>
            <input type="number" value="<?= (isset($_GET['id']))?$select['nombre']:null ?>"   name="nombre" placeholder="entrez le nombre de postes rechercher" required>
        </div>
        </div>
        
        <div class="post">
            <p class="titre">Type de contrats *:</p>
        <select name="contrat" id="">
                <option value=""><?= (isset($_GET['id']))?$select['contrat']: 'Selectionner le type de contrat rechercher' ?></option>
                <?php   while($contrat = $contrats->fetch_assoc()) :?>

                    <option value="<?=$contrat['type']?>"><?=$contrat['type']?></option>

                <?php endwhile;?>
        </select>
        </div>
        <div class="post">
            <p class="titre">Secteur d'activite *:</p>
        <select name="secteur" id="">
                <option value=""><?= (isset($_GET['id']))?$select['secteur_activite']: 'Selectionner le secteur d\'activiter rechercher' ?></option>
                <?php   while($activite = $activites->fetch_assoc()) :?>

                    <option value="<?=$activite['dsc_secteur_activite']?>"><?=$activite['dsc_secteur_activite']?></option>

                <?php endwhile;?>
        </select>
        </div>
        <div class="post">
            <p class="titre">Niveau requis *:</p>
        <select name="niveau" id="">
                <option value=""><?= (isset($_GET['id']))?$select['niveau']: 'Selectionner le niveau requis' ?></option>
                <?php   while($niveau_etude = $niveau_etudes->fetch_assoc()) :?>

                    <option value="<?=$niveau_etude['niveau']?>"><?=$niveau_etude['niveau']?></option>

                <?php endwhile;?>
        </select>
        </div>
        <div class="post">
            <p class="titre">
                Competences requise *:
            </p>
            <textarea name="competences" id="" value="<?= (isset($_GET['id']))?$select['competence']: null ?>" cols="30" rows="10" required placeholder="decrire les competences requise pour postuler"></textarea>
        </div>
        <div class="post">
            <p class="titre">Localite *:</p>
        <select name="region" id="">
        <option value=""><?= (isset($_GET['id']))?$select['localite']: 'Region' ?></option>
            <?php   while($region = $regions->fetch_assoc()) :?>

                <option value="<?=$region['lieu']?>"><?=$region['lieu']?></option>

            <?php endwhile;?>
        </select>
        </div>
        <div class="post">
            <p class="titre">
                Description du poste rechercher *:
            </p>
            <textarea name="description" value="<?= (isset($_GET['id']))?$select['description']: null ?>" id="" cols="30" rows="10" required placeholder="decrire le postes rechercher"></textarea>
        </div>
        <div class="post">
            <p class="titre">
                Image
            </p>
            <input type="file" name="image" id="">
        </div>
    </div>
    <div class="btn">
    <?php if(isset($_GET['id'])): ?>
        <input type="submit" name="modifier">


            <?php else:?>
                <input type="submit" name="submit">
        
        <?php endif; ?>
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