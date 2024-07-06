<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/header.css">
    <link rel="stylesheet" href="../public/css/style_Ins-connect.css">
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
    <div class="mb-4">
        <label for="exampleFormControlInput1" class="form-label">Adresse e-mail </label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <label for="inputPassword5" class="form-label">Mot de passe</label>
    <input type="password" id="inputPassword5" class="form-control" placeholder="Votre mot de passe" aria-describedby="passwordHelpBlock">
    <div class="d-grid gap-2 col-6 mx-auto mt-4">
        <button class="btn btn-primary" type="button">Se connecter</button>
    </div>

</div>
</body>
</html>