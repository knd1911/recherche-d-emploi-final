<?php 
        function est_connect():bool{
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            return isset($_SESSION["candidat"]) || isset($_SESSION["entreprise"]);
        }
        
        function forcer_utilisateur_connecte():void{
        if(!est_connect()){
            header("Location:login");
            exit();
        }
    }