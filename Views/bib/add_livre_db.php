<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../../Config/database.php";

    $conn = database();

// Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $anne = $_POST['anne'];
    $nb_exemplaire = $_POST['nb_exemplaire'];
    $genre = $_POST['genre'];

    // Préparer la requête
    $stmt = $conn->prepare("INSERT INTO livres (titre,auteur,anne,nb_exemplaire,genre) VALUES (?, ?, ?,?,?)");

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Assigner les paramètres de la requête
    $stmt->bind_param('sssis', $titre,$auteur,$anne,$nb_exemplaire,$genre);

    // Exécuter la requête
    $stmt->execute();

    // Vérifier si l'insertion est réussie
    if ($stmt->affected_rows > 0) {
        header("Location: list_livre.php");

    } else {
        echo "pas entre";
    }

}


