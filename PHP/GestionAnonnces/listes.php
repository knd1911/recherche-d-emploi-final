<?php
    require_once'PHP/function/auth.php';
    forcer_utilisateur_connecte();
    $serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
   or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

   $id = (int)$_SESSION['entreprise'] ;

   

$sql = mysqli_query($conn, "SELECT emploi.*, entreprise.*
FROM emploi
JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
WHERE entreprise.id_entreprise = {$id}
ORDER BY emploi.date_publication DESC;");



?>
<div class="listes">
    <div class="side-bar">
            <div class="menu">
        <div class="item"><a href="#"><i class="fas fa-desktop"></i>Gestion des annonces</a></div>
        <div class="item">
            <a class="sub-btn" href="/gestion/annonce/publier">Publier une offre</a>
        </div>
        <div class="item"><a href="#"><i class="fas fa-th"></i>Gerer les candidatures</a></div>
        <div class="item">
            <a class="sub-btn"><i class="fas fa-cogs"></i>Settings<i class="fas fa-angle-right dropdown"></i></a>

        </div>
        <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
        </div>
    </div>
    <div class="content">
    <section>
    <table>
            <tr>
                
                
                <th>Logo</th>
                <th>detaille sur l'offres d'emploi</th>
                <th>Action</th>
            </tr>
            <?php if(mysqli_num_rows($sql)>0):  ?>
                <?php while($row = $sql->fetch_assoc()): ?>
            <tr>
                <td> <img  src="../image/<?= $row['logo_entreprise'] ?>"> </td>
                <td>
                    <h3><?= $row['poste'] ?></h3>
                    <h4><?= $row['date_publication'] ?></h4>
                    <h4>54 vues</h4>
                </td>
                <td>
                    <h3>supprimer</h3>
                    <h3>modifier</h3>
                    <h3>Voir</h3>
                </td>
            </tr> 
                <?php endwhile; ?>
            <?php endif; ?>
            <?php if(mysqli_num_rows($sql)==0):  ?>
                <tr>
                    <td>
                <h3 >Vous n'avez pas encore poster une offre d'emploi</h3>

                    </td>
                </tr>
            <?php endif; ?>
        </table>
</section>
    </div>
</div>

<style>
    .listes{
        display: flex;
        justify-content: center;
        
    }
    .content{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
        width: 60%;
    }
    .slideBar{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        justify-content: left;
        padding: 20px;
        margin: 20px;
        border-radius: 20px;
        position: fixed;
        left: 0;
        height: 400px;
    }
    table{
    border-collapse: collapse;
    width: 100%;
    letter-spacing: 2px;
    font-weight: 400;
}
th{
    padding: 10px 0;
    font-weight: 400;
}
td{
    border-top: 0.5px solid #999;
    color: #04202e;
}
tr{
    border-bottom: 0.5px solid #999;
}

tr:nth-child(even) {
  color: #fff;
}
a{
            text-decoration: none;
            color: #04202e;
            font-size: 20px;
            font-weight: 600;
        }
         a:hover{
            text-decoration: none;
            opacity: 1;
            color: turquoise;
            border-bottom: 2px solid red;
        }
img{
    width: 150px;
    height: 150px;
    border-radius: 20px;
    margin: 10px;
}
.side-bar{

 background: #fff;
 width: 250px;
 height: 70%;
 position: fixed;
 left: 0;
 top: 100px;
 margin: 10px;
 border-radius: 10px;
 
}

.side-bar .menu{
    width: 100%;
}
.side-bar .menu .item{
    position: relative;
    cursor: pointer;
}.side-bar .menu .item a{
    color: #04202e;
    font-size: 16px;
    text-decoration: none;
    display: block;
    padding: 5px 30px;
    line-height: 60px;
}
.side-bar .menu .item a:hover{
 background: #33363a;
 transition: 0.3s ease;
}
.side-bar .menu .item i{
 margin-right: 15px;
}
</style>