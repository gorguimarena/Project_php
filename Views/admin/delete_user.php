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

$status = $_GET['status'];

// Requête pour supprimer un utilisateur
$sql = "DELETE FROM compte WHERE id_user = '$id'";

if ($conn->query($sql) === TRUE) {
    $sql = "DELETE  FROM utilisateur WHERE id= '$id'";
    echo "bon";
    if ($conn->query($sql) === TRUE) {

        $conn->close();
        switch ($status) {
            case "utilisateur":
                header('Location: user_simple.php'); // Rediriger vers la page de l'admin
                break;
            case "administrateur":
                header('Location: admin.php'); // Rediriger vers la page de l'admin
                break;
            case "bibliothecaire":
                header('Location: bib.php'); // Rediriger vers la page de l'admin
                break;
            default:
                header("Location: space_admin.php");
        }
    } else {
        $conn->close();
        header('Location: space_admin.php?msg=utilisateur non supprimer'); // Rediriger vers la page principale
    }
// Requête pour supprimer un utilisateur

}



?>
