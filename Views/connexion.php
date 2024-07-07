<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../public/css/accueil/bootstrap.css">
    <link rel="stylesheet" href="../public/css/accueil/header.css">
    <link rel="stylesheet" href="../public/css/utilisateurs/style_Ins-connect.css">
    <link rel="stylesheet" href="../public/css/utilisateurs/reflet_con.css">
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
                <li><a href="./incriprion.php">S'inscrire <img src="../public/images/IconlogoOut.svg"></a></li>
            </ul>
        </div>
    </nav>
</header>

<img class="reflet-vert" src="../public/images/reflet1.svg">
<img class="reflet-bleu1" src="../public/images/reflet3.svg">
<img class="reflet-jaune1" src="../public/images/reflet2.svg">
<div class="container connexion">
    <h1 class="text-center mb-3">Se connecter</h1>
    <form method="POST" action="">
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Adresse e-mail </label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <label for="inputPassword5" class="form-label">Mot de passe</label>
        <input type="password" id="inputPassword5" name="password" class="form-control" placeholder="Votre mot de passe" aria-describedby="passwordHelpBlock">
        <div class="d-grid gap-2 col-6 mx-auto mt-4">
            <input class="btn btn-primary" type="submit" name="submit" value="Se connecter" >
        </div>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    require "../Config/database.php";

    $con = database();
// Préparation de la requête SQL
    $stmt = $con->prepare("SELECT * FROM compte WHERE email = ?");

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows >0){
        // Préparation de la requête SQL
        $stmt = $con->prepare("SELECT * FROM utilisateur WHERE id = ?");

        while ($row=$result->fetch_assoc()){
            $stmt->bind_param('i', $row['id_user']);
            $stmt->execute();
        }

        $result= $stmt->get_result();

        if ($result->num_rows){
            while ($row=$result->fetch_assoc()){
                switch ($row['status']){
                    case "utilisateur":
                        header("Location: user/space_user.php");
                        break;
                    case "administrateur":
                        header("Location: admin/space_admin.php");
                        break;
                    case "bibliothecaire":
                        header("Location: bib/space_bib.php");
                        break;
                    default:
                        echo "mort";
                }
            }
        }

    }

}

?>
</body>
</html>