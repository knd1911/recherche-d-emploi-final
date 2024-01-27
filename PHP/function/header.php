<?php 
function nav_active(string $lien, string $titre){
    $class = null;
    $path_info = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : '';

    if ($path_info === $lien) {
        $class = 'active';
    }
    
    return <<<HTML
    <a class="$class" href="$lien">$titre</a> 
HTML;
}
?>
    <ul>

    <li><?=nav_active('/', 'Acceuil')?></li>
    <li><?=nav_active('/recherche', 'Rechercher un emploi')?></li>

    <ul>
  <?php require_once 'PHP/function/header.php';  ?>
  <li style="float:right">
    <ul>
    <?php if(!est_connect()):?>
        <li><?= nav_active("/inscription","S'incrire")?></li>
        <li><?=nav_active("/login", "Se connecter")?></li>
    <?php endif; ?>
    <?php if(est_connect()):?>
        <li>
          <?php if(isset($_SESSION["candidat"])): ?>
          <li><?= nav_active("/Mes_candidatures","Mes Candidatures")?></li>
            
           <li> <?= nav_active("/compte","Compte")?></li>
            
          <?php elseif(isset($_SESSION["entreprise"])) :?>
            <li>
            <?= nav_active("/gestion/annonce","Gerer vos annonces")?></li></li>
            <li>
            <?= nav_active("/Compte","Compte")?></li>
          <?php endif; ?>
        <li><a href="deconnecte">Se deconnecter</a></li>
    <?php endif; ?>
    <?php if(admin_connect()):?>
      <li><a href="PHP/dashboard.php">Dashboard</a></li>
      <?php endif; ?>
    </ul>
    </li>
</ul>

