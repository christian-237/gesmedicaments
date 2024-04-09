<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "christian", "Christian$1", "boutique");

$start = $_POST['start'];
$length = $_POST['length'];
$draw = $_POST['draw'];
$searchValue = $_POST['search']['value'];

// Requête SQL pour récupérer les données avec pagination et recherche
$sql = "SELECT idProd, codeProd, nomProd, prixU FROM produit WHERE nomProd LIKE '%$searchValue%' OR codeProd LIKE '%$searchValue%' ORDER BY idProd ASC LIMIT $start, $length";
$result = $conn->query($sql);

// Formatage des données pour DataTables
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Fermer la connexion
$conn->close();

// Réponse JSON à DataTables
$response = array(
    "draw" => intval($draw),
    "recordsTotal" => count($data), // Le nombre total de lignes sans pagination
    "recordsFiltered" => count($data), // Le nombre total de lignes après recherche
    "data" => $data
);

echo json_encode($response);
?>
