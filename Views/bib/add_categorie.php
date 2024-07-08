<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../../Config/database.php";

    $conn = database();

// Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $nom = $_POST['nom'];
    $description = $_POST['description'];


    // Préparer la requête
    $stmt = $conn->prepare("INSERT INTO genre (nom,description) VALUES (?,?)");

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Assigner les paramètres de la requête
    $stmt->bind_param('ss', $nom,$description);

    // Exécuter la requête
    $stmt->execute();

    // Vérifier si l'insertion est réussie
    if ($stmt->affected_rows > 0) {
        header("Location: categorie_list.php");

    } else {
        echo "pas entre";
    }

}


