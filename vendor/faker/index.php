<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// include "connexion.php";
// require 'autoload.php';
$servername = "localhost";
$username = "christian";
$password = "Christian$1";
$dbname = "boutique";

// Établissement de la connexion
$conn = new mysqli("localhost", "christian", "Christian$1", "boutique");
// $pdo = new PDO("mysql:host=localhost;dbname=boutique", 'christian', 'Christian$1');

require 'Faker/src/autoload.php';
$faker = Faker\Factory::create('fr_FR');

$produitData = [];
for ($i = 0; $i < 1000; $i++) {
    $produitData[] = [
        'codeProd' => $faker->ean13,
        'nomProd' => $faker->sentence(3),
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl(200, 200),
        'poid' => $faker->randomFloat(2, 0.1, 1000),
        'prixU' => $faker->numberBetween(10, 1000),
        'prixV' => $faker->numberBetween(11, 1001),
        'dateAjout' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'dateModif' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'idUser' => $faker->numberBetween(1, 10) // Assurez-vous que ces valeurs correspondent aux IDs réels dans votre base de données
    ];
}

// Requête d'insertion avec ajout du champ "etat"
foreach ($produitData as $data) {
    $sql = "INSERT INTO produit (codeProd, nomProd, description, image, poid, prixU, prixV, dateAjout, dateModif, idUser, etat) VALUES ('" . $data['codeProd'] . "', '" . $data['nomProd'] . "', '" . $data['description'] . "', '" . $data['image'] . "', '" . $data['poid'] . "', '" . $data['prixU'] . "', '" . $data['prixV'] . "', '" . $data['dateAjout'] . "', '" . $data['dateModif'] . "', '" . $data['idUser'] . "', 'active')";

    if ($conn->query($sql) !== TRUE) {
        echo "Erreur lors de l'insertion des données dans la table produit : " . $conn->error;
    }
}

        // $pdo->exec($sql);


// $userData = [];

// for ($i = 0; $i < 10; $i++) {
//     $userData[] = [
//         'idU' => $faker->numberBetween(1, 1000),
//         'nom' => $faker->lastName,
//         'prenom' => $faker->firstName,
//         'login' => $faker->userName,
//         'password' => $faker->password,
//         'telephone' => $faker->numerify('##########'),
//         'idRole' => $faker->numberBetween(1, 3),
//         'dateAjout' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
//         'dateModif' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
//     ];
// }

// Requête d'insertion
foreach ($userData as $data) {
        $sql = "INSERT INTO user (idU, nom, prenom, login, password, telephone, idRole, dateAjout, dateModif) VALUES ('" . $data['idU'] . "', '" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['login'] . "', '" . $data['password'] . "', '" . $data['telephone'] . "', '" . $data['idRole'] . "', '" . $data['dateAjout'] . "', '" . $data['dateModif'] . "')";
    
        if ($conn->query($sql) !== TRUE) {
            echo "Erreur lors de l'insertion des données dans la table user : " . $conn->error;
        }
    }

?>