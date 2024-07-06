<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'library');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer l'ID de l'utilisateur à supprimer
$id = $_GET['id'];

// Requête pour supprimer un utilisateur
$sql = "DELETE FROM users WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Utilisateur supprimé avec succès";
} else {
    echo "Erreur : " . $conn->error;
}

$conn->close();
header('Location: utilisateur.php'); // Rediriger vers la page principale
?>
