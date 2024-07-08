<?php
// Connexion à la base de données
require "../../Config/database.php";

$conn = database();


// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer l'ID de l'utilisateur à supprimer
$id = $_GET['id'];

/*// Requête pour supprimer un utilisateur
$sql = "DELETE FROM compte WHERE id_user = '$id'";

if ($conn->query($sql) === TRUE) {
    $sql = "DELETE FROM utilisateur WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur supprimé avec succès";
    } else {
        echo "Erreur : " . $conn->error;
    }

} else {
    echo "Erreur : " . $conn->error;
}*/
// Requête pour supprimer un utilisateur
$sql = "DELETE FROM genre WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header('Location: categorie_list.php'); // Rediriger vers la page principale
}else{
    $conn->close();
    header('Location: categorie_list.php?msg=erreur'); // Rediriger vers la page principale
}




?>
