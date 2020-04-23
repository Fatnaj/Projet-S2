<?php
function connectMaBase(){
    $serveur = 'localhost';
    $utilisateur = 'root';
    $motdepasse = '';
    $nom_base = 'guesscorrelation';

    $mysqli = new mysqli($serveur, $utilisateur, $motdepasse, $nom_base);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: ".$mysqli->connect_error);
    }
    return $mysqli;
}
?>
