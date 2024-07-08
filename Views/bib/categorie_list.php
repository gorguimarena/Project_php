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
        <section class="user-management">
            <h2>Ajouter un Nouvel </h2>
            <form id="add-user-form" action="add_categorie.php" method="POST">
                <label for="nom">Nom du genre</label>
                <input type="text" id="nom" name="nom" required>
                <label for="description">La description</label>
                <textarea id="description" name="description">

                </textarea>

                <button type="submit" class="btn">Ajouter</button>
            </form>
        </section>

        <section class="user-list">
            <h2>Liste des Utilisateurs</h2>
            <div class="row ">
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
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["nom"]; ?> </h5>
                                <p class="card-text"><?php echo $row["description"]; ?></p>
                                <a href='delete_categorie.php?id=<?php echo $row["id"]; ?>'class="btn btn-primary">Supprimer</a>
                            </div>
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