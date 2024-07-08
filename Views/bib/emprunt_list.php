<?php
session_start();

if (isset($_SESSION['bibliothecaire'])) {
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biblio</title>
        <link rel="stylesheet" href="../../public/css/accueil/bootstrap.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/header.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/footer.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/main.css">
        <link rel="stylesheet" href="../../public/css/accueil/cards.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/categorie-cards.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/caroussel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body>
    <header id="nav-bar">
        <nav class="nav-bar">
            <div class="logo">
                <img src="../../public/images/logo.svg" alt="Notre logo">
                <h2>Biblio</h2>
            </div>
            <div>
                <ul class="nav-right">
                    <li><a href="space_bib.php">Accueil</a></li>
                    <li><a href="list_livre.php">Livre</a></li>
                    <li><a href="categorie_list.php">Categorie</a></li>
                    <li><a href="emprunt_list.php">Demandes d'emprunt</a></li>
                    <li><a href="../logout.php">Déconnexion</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
        <h1>List Emprunt</h1>
    </main>
    <footer>
        <p class="text-center">&copy; 2024 Bibliothèque. Tous droits réservés.</p>
    </footer>
    </body>
    </html>
    <?php
} else {
    header("Location: ../connexion.php?msg=non entrer");

}