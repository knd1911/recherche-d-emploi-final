<?php 
require_once'PHP/function/auth.php';
forcer_utilisateur_connecte();
$id = (int)$_SESSION['entreprise'];
require_once 'PHP/config/config.php';
$entreprises = mysqli_query($conn, "SELECT * FROM entreprise where id_entreprise = {$id}");
$entreprise = $entreprises->fetch_assoc();



   

$sql = mysqli_query($conn, "SELECT emploi.*, entreprise.*
FROM emploi
JOIN entreprise ON emploi.id_entreprise = entreprise.id_entreprise
WHERE entreprise.id_entreprise = {$id}
ORDER BY date_publication DESC
LIMIT 3 ");

$postuler = mysqli_query($conn, "SELECT candidat.*, postuler.*
FROM postuler
JOIN candidat ON postuler.id_candidat = candidat.id_candidat
WHERE id_entreprise = {$id}
ORDER BY date_publication DESC
LIMIT 3 ");



?>



<div class="border">
    <div class="head">
        <h3>Mon profil</h3>
    </div>
    <div class="flex">
    <div class="bottom">
        <h3>Nom de l'entreprise : <?=  $entreprise['nom_entreprise'] ?></h3>
        <h3>Adresse : <?=  $entreprise['adresse_entreprise'] ?></h3>
        <h3>ville : <?=  $entreprise['ville'] ?></h3>
        <h3>Nom du contact : <?=  $entreprise['prenom'] ?></h3>
        <h3>Numero : <?=  $entreprise['numero'] ?></h3>
        <h3>Email : <?=  $entreprise['email_entreprise'] ?></h3>
    </div>
    <div class="bottom">
        <img src="../image/<?=  $entreprise['logo_entreprise'] ?>" alt="">
    </div>
    </div>
</div>    
<div class="border">
    <div class="head">
        <h3>Mes dernierres annonces</h3>
    </div>
    <section>
    <table>
            <tr>
                
                
                <th>Logo</th>
                <th>detaille sur l'offres d'emploi</th>

            </tr>
            <?php if(mysqli_num_rows($sql)>0):  ?>
                <?php while($row = $sql->fetch_assoc()): ?>
            <tr>
                <td> <img  src="../image/<?= $row['logo_entreprise'] ?>"> </td>
                <td>
                    <h3><?= $row['poste'] ?></h3>
                    <h4><?= $row['date_publication'] ?></h4>
                    <h4><?= $row['competence'] ?></h4>
                    <h4><?= $row['views'] ?> vue(5) </h4>
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

    <div class="btn">
    
        </div>
</div>
<div class="border">
    <div class="head">
        <h3>Les dernierres candidatures</h3>
    </div>
    <section>
    <table>
            <tr>
                
                
                <th>Photo</th>
                <th>Nom et Prenom</th>

            </tr>
            <?php if(mysqli_num_rows($postuler)>0):  ?>
                <?php while($postule = $postuler->fetch_assoc()): ?>
            <tr>
                <td> <img  src="../image/<?= $postule['image'] ?>"> </td>
                <td>
                    <h3><?= $postule['nom_candidat'] ." ". $postule['prenom'] ?></h3>
                    <h4><?= $postule['numero'] ?></h4>

                    <h4><?= $postule['email'] ?></h4>
    
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
            <div class="btn">
            <a href="gestion/annonce">Gerer</a>
            </div>

</div>
<style>
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
    .img img{
        width: 200px;
        height: 200px;
        border-radius: 20px;
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
    .flex{
        display: flex;
        justify-content: space-between;
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
    img{
      width: 280px;
      height: 280px;  
      border-radius: 20px;
      margin: 20px;
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