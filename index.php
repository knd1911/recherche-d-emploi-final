<?php
require_once'PHP/function/auth.php';
ob_start();
est_connect();
$serveur = "localhost"; 
$nomUtilisateur = "test";
$motDePasse = "MyP@ssw0rd123";
$nomBaseDeDonnees = "emploi";

$conn = mysqli_connect($serveur, $nomUtilisateur, $motDePasse, $nomBaseDeDonnees)
   or die("La connexion à la base de données a échoué : " . mysqli_connect_error());

   //unset($_SESSION['candidat']);
                $id=$_SESSION['candidat']?:null;
/*
if (!isset($_SERVER["REQUEST_URI"])) {
    ob_start();
    require_once 'PHP/accueil.php';
    $contenu = ob_get_clean();
}else
if (isset($_SERVER["REQUEST_URI"])) {
    $page = $_SERVER["REQUEST_URI"];
    if($page == '/test' ){
        ob_start();
        require_once 'test.php';
        $contenu = ob_get_clean();
    }
}*/
$requestUri = $_SERVER["REQUEST_URI"];

function route($requestUri) {
    $path = strtok($requestUri, '?');
    switch ($path) {
        case '/':
            require_once 'PHP/accueil.php';;
            break;
        case '/inscription':
            include('PHP/choix/inscription.php');
            break;
        case '/inscription/candidat':
            include('PHP/candidatLogin.php');
            break;
        case '/inscription/login':
            include('PHP/location/login.php');
            break;
            case '/utilisateur/login':
              include('PHP/location/login.php');
              break;
        case '/login':
            include('PHP/login.php');
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
              case "/utilisateur/update":
                include('PHP/candidatProfil.php');
                break;
          case '/utilisateur/deconnecte':
            include('PHP/location/logout.php');
            break;
            case '/deconnecte':
              include('PHP/location/logout.php');
              break;  
        default:
            include('PHP/404.php');
            break;
    }
}
var_dump('/utilisateur/'.$id);
route($requestUri);

$contenu = ob_get_clean();


?>
<pre>
</pre>
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
<ul>
  <li><a href="/">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right">
    <ul>
    <?php if(!est_connect()):?>
        <li><a href="inscription">S'incrire</a></li>
        <li><a href="login">Se connecter</a></li>
    <?php endif; ?>
    <?php if(est_connect()):?>
        <li><a href="compte">compte</a></li>
        <li><a href="deconnecte">Se deconnecter</a></li>
    <?php endif; ?>
    </ul>
    </li>
</ul>
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
  padding: 20px;
}
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
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
    padding: 20px;
    text-decoration: none;
  }
  
  /* Change the link color to #111 (black) on hover */
  nav ul li a:hover {
    background-color: #f34545;
    color: #fff;
    font-weight: 800;
  }

  footer {
    background-color: #fff;
    padding: 10px;
    margin: 20px;
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