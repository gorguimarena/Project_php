<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../public/css/accueil/bootstrap.css">
    <link rel="stylesheet" href="../public/css/accueil/header.css">
    <link rel="stylesheet" href="../public/css/utilisateurs/style_Ins-connect.css">
    <link rel="stylesheet" href="../public/css/utilisateurs/reflet_ins.css">
</head>

<body>
<header>
    <nav class="nav-bar">
        <div class="logo">
            <img src="../public/images/logo.svg" alt="Notre logo">
            <h2>Biblio</h2>
        </div>
        <div>
            <ul class="nav-right">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="./incriprion.php">Se Connecter <img src="../public/images/IconlogoOut.svg"></a></li>
            </ul>
        </div>
    </nav>
</header>


<img class="reflet-vert" src="../public/images/reflet1.svg">
<img class="reflet-bleu1" src="../public/images/reflet3.svg">
<img class="reflet-jaune1" src="../public/images/reflet2.svg">
<div class="incrire">
    <div class="info">
        <div class="container">
            <h1 class="text-center mb-2 mt-4">S'inscrire</h1>
            <form action="" method="POST">
                <div class="mb-4">
                    <label for="nom" class="form-label">Nom </label>
                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom">
                </div>
                <div class="mb-4">
                    <label for="prenom" class="form-label">Prenom </label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prenom">
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Adresse e-mail </label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                           placeholder="name@example.com">
                </div>
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password"  name="password" id="password" class="form-control" placeholder="Votre mot de passe"
                       aria-describedby="passwordHelpBlock">
                <label for="conf" class="form-label mt-4">Confirmation ot de passe</label>
                <input type="password" name="conf" id="conf" class="form-control"
                       placeholder="Confirmer votre mot de passe" aria-describedby="passwordHelpBlock">
                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <input class="btn btn-primary " name="submit" type="submit" value="S'inscrire">
                </div>
            </form>
        </div>
    </div>

    <div class="desc text-center">
        <h1 class="mt-5 mb-5">La lecture</h1>
        <p><h6><strong>Lire, c'est voyager sans quitter son fauteuil,</strong> disait Émile Zola. <br>Les livres sont
            des portails vers des mondes inconnus, <br>des fenêtres sur l'âme humaine et des refuges pour l'esprit.<br>
            En ouvrant un livre, vous embarquez pour une aventure où chaque page est une nouvelle découverte,<br> chaque
            chapitre une étape vers l'inattendu.

            <br>Imaginez-vous plongé dans un roman captivant, <br>où les personnages deviennent des amis intimes, <br>où
            les intrigues vous tiennent en haleine et où chaque mot résonne comme une mélodie.<br> Lire, c'est vivre
            mille vies, ressentir mille émotions et<br> comprendre mille perspectives différentes. C'est un exercice
            d'empathie,<br> une invitation à penser et à rêver.

            Victor Hugo disait : <strong>Lire, c'est boire et manger.<br> L'esprit qui ne lit pas maigrit comme le corps
                qui ne mange pas.</strong></h6></p>
    </div>
</div>
<?php


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {



    require_once "../Config/database.php";

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
    $status="utilisateur";

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

        // Rediriger vers la page de connexion
        header('Location: connexion.php');
        exit(); // Assurez-vous que le script s'arrête après la redirection
    } else {
        echo "Échec de l'insertion de l'utilisateur.";
    }

    // Fermer la requête
    $stmt->close();
}

// Fermer la connexion à la base de données
$conn->close();
?>
</body>
</html>