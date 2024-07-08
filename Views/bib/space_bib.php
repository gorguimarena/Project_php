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
        <link rel="stylesheet" href="../../public/css/utilisateurs/main.css">
        <link rel="stylesheet" href="../../public/css/accueil/cards.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/footer.css">
        <link rel="stylesheet" href="../../public/css/utilisateurs/caroussel.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
    <body >
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

    <main class="" style="height: 150vh">
        <section class="carousel">
            <div class="carousel-container">
                <div class="carousel-slide active">
                    <img src="../../public/images/back1.jpg" alt="Image 1">
                </div>
                <div class="carousel-slide">
                    <img src="../../public/images/back1.jpg" alt="Image 2">
                </div>
                <div class="carousel-slide">
                    <img src="../../public/images/back1.jpg" alt="Image 3">
                </div>
                <div class="carousel-slide">
                    <img src="../../public/images/back3.jpg" alt="Image 4">
                </div>
                <div class="carousel-slide">
                    <img src="../../public/images/back2.jpg" alt="Image 5">
                </div>
                <div class="carousel-slide">
                    <img src="../../public/images/back1.jpg" alt="Image 6">
                </div>
                <div class="carousel-slide">
                    <img src="../../public/images/back1.jpg" alt="Image 7">
                </div>
                <a class="prev" onclick="moveSlide(-1)">&#10094;</a>
                <a class="next" onclick="moveSlide(1)">&#10095;</a>
            </div>
        </section>
        <div class="center">
            <img src="../../public/images/redcenter.svg">
        </div>

        <section class="mt-5 container">
            <h1>Liste des Genre</h1>
            <div class="row">
                <?php
                // Connexion à la base de données
                require "../../Config/database.php";

                $conn = database();

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Requête pour obtenir tous les utilisateurs
                $sql = "SELECT * FROM genre";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // Afficher chaque utilisateur
                while($row = $result->fetch_assoc()) {
                    ?>
                    <!--<div class="col-sm-3 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php /*echo $row["nom"]; */?> </h5>
                                <p class="card-text"><?php /*echo $row["description"]; */?></p>
                            </div>
                        </div>
                    </div>-->
                    <div class="card border-dark mb-3  mt-4" style="max-width: 18rem;">
                        <div class="card-header">Genre</div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["nom"]; ?></h5>
                            <p class="card-text"><?php echo $row["description"]; ?></p>
                        </div>
                    </div>

                    <?php
                }
                ?>

                <div class="row ">
                    <?php
                    } else {
                        ?>

                        <h1 class="mt-5">Aucun Genre enregistré</h1>


                        <?php
                    }

                    $conn->close();
                    ?>

        </section>
        <div class="center">
            <img src="../../public/images/redcenter.svg">
        </div>
    </main>
    <footer>
        <p class="text-center">&copy; 2024 Bibliothèque. Tous droits réservés.</p>
    </footer>
    <script src="../../public/js/scripte.js"></script>
    </body>
    </html>
    <?php
} else {
    header("Location: ../connexion.php?msg=non entrer");

}