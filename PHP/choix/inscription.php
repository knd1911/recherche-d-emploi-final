<?php
require_once'PHP/function/auth.php';

if (est_connect()) {
    header('location:/');
}
?>
<div class="inscription">
    <h1>Choisir l'inscription </h1>
<div class="choix">
    <a href="inscription/candidat">Candidat</a>
    <a href="inscription/recruteur">Employeur</a>
</div>
</div>

<style>
    .inscription{
        background-color: #fff;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.5);
        padding: 20px;
        border-radius: 20px;
    }
    .choix{
        display: flex;
        justify-content: center;
    }
    .choix a{
        text-decoration: none;
        padding: 50px;
        margin-top: 10%;
        margin-left: 10%;
        border: 1px solid #ccc;
        border-radius: 10px;
        color: #04202e;
        font-size: 60px;
        background-color: #f34545;
    }
</style>