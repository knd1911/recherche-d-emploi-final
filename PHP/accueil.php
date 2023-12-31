<?php 
    ob_start();

require_once 'PHP/triatement/metierSelect.php';
?>
<link rel="stylesheet" href="CSS/accueil.css">
<div class="recherche">
<h1>Rechercher un emploi</h1>
<div class="search">
    <div class="input">
    <div class="div">
        <select name="metier" id="">
            <? echo  $metier?>
        </select>
    </div>
    <div class="div">
    <select name="region" id="">
            <option value="">Region</option>
            <option value="1">salut</option>
        </select>
    </div>
    <input type="submit" value="Rechercher">
    </div>
</div>
</div>


<script src="JS/accueil.js"></script>
<?php $accueil = ob_get_clean(); ?>