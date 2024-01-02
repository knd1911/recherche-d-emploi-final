<?php 
        function est_connect():bool{
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            return !empty($_SESSION["candidat"]);
        }
        function forcer_utilisateur_connecte():void{
        if(!est_connect()){
            header("Location:login");
            exit();
        }
    }