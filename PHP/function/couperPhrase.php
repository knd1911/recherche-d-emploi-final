<?php 


function couperPhrase($phrase, $nombreDeMots = 19) {
    $mots = explode(" ", $phrase);
    if (count($mots) > $nombreDeMots) {
        $motsCoupes = array_slice($mots, 0, $nombreDeMots);
        $phraseCoupée = implode(" ", $motsCoupes);
        $phraseCoupée .= "...";

        return $phraseCoupée;
    } else {
        return $phrase;
    }
}