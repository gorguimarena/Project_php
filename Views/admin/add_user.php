<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../../Config/database.php";

    $conn = database();

// Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf = $_POST['conf'];
    $status=$_POST['status'];

    // Vérifier la confirmation du mot de passe
    if ($password !== $conf) {
        die("Les mots de passe ne correspondent pas.");
    }

    // Préparer la requête
    $stmt = $conn->prepare("INSERT INTO utilisateur (nom,prenom,status) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    // Assigner les paramètres de la requête
    $stmt->bind_param('sss', $nom,$prenom,$status);

    // Exécuter la requête
    $stmt->execute();

    // Vérifier si l'insertion est réussie
    if ($stmt->affected_rows > 0) {
        // Récupérer l'ID de l'utilisateur inséré
        $id = $stmt->insert_id;

        // Créer un compte administrateur
        //on prepare la requete
        $stmt=$conn->prepare("INSERT INTO compte(email,password,id_user) VALUES (?,?,?)");
        //on donne les parametre de la requete
        $stmt->bind_param('sss',$email,$password,$id);
        //on execute la requete
        $stmt->execute();

        // Fermer la requête
        $stmt->close();
        //demarrage de la session


        //verification si la seesion est ouvert pour s'assurer que la request vient de l'admin
        if (isset($_SESSION["admin"])){
            switch ($status){
                case "utilisateur":
                    header('Location: user_simple.php'); // Rediriger vers la page de l'admin
                    break;
                case "administrateur":
                    header('Location: admin.php'); // Rediriger vers la page de l'admin
                    break;
                case "bibliothecaire":
                    header('Location: bib.php'); // Rediriger vers la page de l'admin
                    break;
            }
        }else{
            // Rediriger vers la page de connexion
            header('Location: ../connexion.php');
        }
        exit(); // Assurez-vous que le script s'arrête après la redirection
    } else {
        echo "Échec de l'insertion de l'utilisateur.";
    }

}else{
    echo "pas entre";
}




