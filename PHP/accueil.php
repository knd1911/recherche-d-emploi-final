<?php 
 
 $serveur = "localhost"; 
 $nomUtilisateur = "test";
 $motDePasse = "MyP@ssw0rd123";
 $nomBaseDeDonnees = "emploi";
 
 $conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees);

 $rg = mysqli_query($conn, 'SELECT * from zone_geo');
 $sql = mysqli_query($conn, 'SELECT * from metier');
 

?>
<link rel="stylesheet" href="CSS/accueil.css">
<div class="recherche">
<h1>Rechercher un emploi</h1>
<div class="search">
    <div class="input">
    <div class="div">
        <select name="metier" id="">
            <option value="">Choisir un metier a rechercher</option>
     <?php   while($metiers = $sql->fetch_assoc()) :?>

    <option value="<?=$metiers['id_metier']?>"><?=$metiers['description_metier']?></option>

<?php endwhile;?>
        </select>
    </div>
    <div class="div">
    <select name="region" id="">
            <option value=""> La Region</option>
            <?php   while($region = $rg->fetch_assoc()) :?>

                <option value="<?=$region['id_zone_geo']?>"><?=$region['lieu']?></option>

            <?php endwhile;?>
        </select>
    </div>
    <input type="submit" value="Rechercher">
    </div>
</div>
</div>
<div class="form">
<?php   while($metiers = $sql->fetch_assoc()) :?>

<p><?=$metiers['description_metier']?></p>

<?php endwhile;?>
</div>

<script src="JS/accueil.js"></script>