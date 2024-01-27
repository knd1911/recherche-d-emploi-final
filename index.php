<?php
ob_start();
require_once'PHP/function/auth.php';
est_connect();
admin_connect();
$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
   or die("La connexion à la base de données a échoué : " . mysqli_connect_error());


   $id = isset($_SESSION['candidat']) ? $_SESSION['candidat'] : null;

$requestUri = $_SERVER["REQUEST_URI"];
$getUri = $_GET;

/*
$vue_select = mysqli_query($conn, "SELECT * FROM vues");
$vue_totals = $vue_select->fetch_assoc();
$vue_total = $vue_totals['vues_total'];
$vue_id = $vue_totals['id'];*/



function route($requestUri) {
    $path = strtok($requestUri, '?');
    switch ($path) {
        case '/':
            require_once 'PHP/accueil.php';;
            break;
        case '/inscription':
            include('PHP/choix/inscription.php');
            break;
            case '/offre/inscription':
              include('PHP/choix/inscription.php');
              break;
              case '/offre/voirPlus/inscription':
                include('PHP/location/inscription.php');
                break;
                case '/inscription/inscription':
                  include('PHP/location/inscription.php');
                  break;
        case '/inscription/candidat':
            include('PHP/candidatLogin.php');
            break;
            case '/inscription/recruteur':
              include('PHP/recruteurLogin.php');
              break;
        case '/inscription/login':
            include('PHP/location/login.php');
            break;
            case '/utilisateur/login':
              include('PHP/location/login.php');
              break;
              case '/gestion/login':
                include('PHP/location/login.php');
                break;
                case '/offre/login':
                  include('PHP/location/login.php');
                  break;
                  case '/PHP/login':
                    include('PHP/location/login.php');
                    break;
                  case '/offre/voirPlus/login':
                    include('PHP/location/login.php');
                    break;
        case '/login':
            include('PHP/login.php');
            break;
            case '/admin/login':
              include('PHP/login copy.php');
              break;
        case '/oublier':
            include('PHP/MotDePasseOublier.php');
            break;
        case '/renitialise':
          include('PHP/ResetPassword.php');
          break;
        case "/utilisateur/compte":
          include('PHP/candidatCompte.php');
          break;
          case "/compte":
            include('PHP/candidatCompte.php');
            break;
            case "/update":
              include('PHP/candidatProfil.php');
              break;
              case "/gestion/annonce":
                include('PHP/GestionAnonnces/listes.php');
                break;
                case "/entreprise/gestion/annonce":
                  include('PHP/location/GestionAnnonce.php');
                  break;
              case "/utilisateur/update":
                include('PHP/candidatProfil.php');
                break;
          case '/utilisateur/deconnecte':
            include('PHP/location/logout.php');
            break;
            case '/entreprise/deconnecte':
              include('PHP/location/logout.php');
              break;
              case '/offre/deconnecte':
                include('PHP/location/logout.php');
                break;
                case '/gestion/deconnecte':
                  include('PHP/location/logout.php');
                  break;
                case '/offre/voirPlus/deconnecte':
                  include('PHP/location/logout.php');
                  break;
            case '/deconnecte':
              include('PHP/location/logout.php');
              break;
              case 'phpcandidatures/deconnecte':
                include('PHP/location/logout.php');
                break;
              case '/gestion/annonce/deconnecte':
                include('PHP/location/logout.php');
                break;
                case '/Compte':
                  include('PHP/compteEntreprise.php');
                  break;
              case '/entreprise/compte':
                include('PHP/compteEntreprise.php');
                break;
                case '/entreprise/compte':
                  include('PHP/compteEntreprise.php');
                  break;  
                case '/entreprise/entreprise/compte':
                  include('PHP/location/entrepriseCompte.php');
                  break;  
                  case '/gestion/entreprise/compte':
                    include('PHP/location/entrepriseCompte.php');
                    break; 
                    case '/offre/entreprise/compte':
                      include('PHP/location/entrepriseCompte.php');
                      break; 
                      case '/offre/comptes':
                        include('PHP/location/entrepriseCompte.php');
                        break; 
                        case '/offre/compte':
                          include('PHP/location/comptes.php');
                          break; 
                    case '/gestion/annonce/entreprise/compte':
                      include('PHP/location/entrepriseCompte.php');
                      break; 
                    case '/gestion/annonce/publier':
                      include('PHP/GestionAnonnces/publierAnonnce.php');
                      break; 
                      case '/gestion/annonce/modifier':
                        include('PHP/GestionAnonnces/publierAnonnce.php');
                        break; 
                      case '/recherche':
                        include('PHP/recherche.php');
                        break; 
                        case '/offre/voirPlus':
                          include('PHP/voirPlus.php');
                          break; 
                          case '/candidatures/Profil':
                            include('PHP/voirProfil.php');
                            break; 
                            case '/Profil':
                              include('PHP/voirProfil.php');
                              break;
                          case '/postuler':
                            include('PHP/postule.php');
                            break; 
                            case '/Mes_candidatures':
                              include('PHP/MesCandidatures.php');
                              break; 
                              case '/gestion/candidature':
                                include('PHP/location/candidatures.php');
                                break; 
                                case '/candidature':
                                  include('PHP/candidatures.php');
                                  break; 
                                  case '/dash':
                                    include('PHP/location/dash.php');
                                    break;
                
              


        default:
            include('PHP/404.php');
            break;
    }
}

route($requestUri);

$contenu = ob_get_clean();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/template.css">
    <title></title>
</head>
<body>
<nav>

  <?php require_once 'PHP/function/header.php';  ?>

</nav>




<div class="container">
    <?= $contenu ?> 
</div>




<footer id="footer">
    <div class="credite text-center">
        Designed By <a href="#"> Esta Coding</a>
    </div>
    <div class="copyright text-center">
      &copy; Copyright <strong><span>Recherche d'emploi</span></strong>. tous droits reservés
  </div>
</footer>
</body>
</html>

<style>
    body{
  background-color: lightgray;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
nav{
  


  position: sticky;
  top: 0;
}
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 10px;
    overflow: hidden;
    background-color: #fff;
  }
  
  nav ul li {
    float: left;
  }
  
  nav ul li a {
    display: block;
    color: #333;
    text-align: center;
    text-decoration: none;
    margin-left: 20px;
  }
  
  /* Change the link color to #111 (black) on hover */
  nav ul li a:hover {
    background-color: #f34545;
    color: #fff;
    font-weight: 800;
  }
  .active{
    
    

    font-size: 20px;
    font-weight: 600;
    color: #04202e;
  }
  footer {
    background-color: #fff;
    padding: 10px;
    text-align: center;
    color: #333;
    margin-top: auto;
  }
  footer .credite a{
    color: #f34545;
  }
  .container{
    margin-left: 30px;
  }
</style>