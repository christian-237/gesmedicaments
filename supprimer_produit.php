<?php
// Suppression d'un produit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "christian", "Christian$1", "boutique");
    $sql = "DELETE FROM produit WHERE idProd = $id";

    if ($conn->query($sql) === TRUE) {
        // Si la suppression est réussie, renvoyer une réponse JSON avec un succès
        $response = array('success' => true);
        echo json_encode($response);
    } else {
        // En cas d'erreur lors de la suppression, renvoyer une réponse JSON avec un message d'erreur
        $response = array('success' => false, 'error' => 'Erreur lors de la suppression du produit');
        echo json_encode($response);
    }

    // $conn->close();
}
?>