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

            if ($result->num_rows > 0) {?>
            <h2>Ajouter un Nouvel Livre</h2>
            <form id="add-user-form" action="add_livre_db.php" method="POST">
                <label for="titre">Titre</label>
                <input type="text" id="titre" name="titre" required>

                <label for="auteur">Auteur</label>
                <input type="text" id="auteur" name="auteur" required>

                <label for="anne">Annee de publication</label>
                <input type="date" id="anne" name="anne" required>

                <label for="nb_exemplaire">Nombre d'exemplaire</label>
                <input type="number" id="nb_exemplaire" name="nb_exemplaire" required>

                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nom'] . "'>" . $row["nom"] . "</option>";
                    }

                ?>
                </select>

                <button type="submit" class="btn">Ajouter</button>
            </form>
            <?php // Afficher chaque utilisateur

            }else{
                echo "<h1>La liste des genre est vide ce qui pourrait empecher l'enregistrement de livre</h1>";
            }

            ?>
        </section>

        <section class="user-list">
            <h2>Liste des Livre</h2>
            <table>
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Nom de l'ateur</th>
                    <th>Annee de publication</th>
                    <th>Nombre d'exemplaire</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Requête pour obtenir tous les utilisateurs
                $sql = "SELECT * FROM livres";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher chaque utilisateur
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["titre"] . "</td>
                                <td>" . $row["auteur"] . "</td>
                                <td>" . $row["anne"] . "</td>
                                <td>" . $row["nb_exemplaire"] . "</td>
                                <td>" . $row["genre"] . "</td>
                                <td>
                                    <a href='edit_livre.php?id=" . $row["id"] . "' class='edit-btn'><i class='fas fa-edit'></i></a>
                                    <a href='delete_livre.php?id=" . $row["id"] . "' class='delete-btn'><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun livres trouvé</td></tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
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