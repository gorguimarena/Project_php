<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'library');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$username = $_POST['nom'];
$role = $_POST['role'];

// Requête pour ajouter un utilisateur
$sql = "INSERT INTO users (username, role) VALUES ('$username', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel utilisateur ajouté avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: index.php'); // Rediriger vers la page principale
?>
