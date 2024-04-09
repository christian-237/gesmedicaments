<?php
$serveur = 'localhost'; // ou IP du serveur MariaDB
$utilisateur = 'christian';
$motDePasse = 'Christian$1';
$baseDeDonnees = 'boutique';

$mysqli = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

echo 'Connexion réussie !';


// $mysqli->close(); // Fermer la connexion
?>
