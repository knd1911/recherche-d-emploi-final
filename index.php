<?php

require_once 'PHP/config/config.php';
require_once 'PHP/accueil.php';



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
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right">
    <ul>
        <li><a href="">S'incrire</a></li>
        <li><a href="">Se connecter</a></li>
    </ul>
    </li>
</ul>
</nav>




<div class="container">
    <?= $accueil ?> 
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