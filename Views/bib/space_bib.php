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
<img class="reflet-vert" src="../../public/images/reflet1.svg">
<img class="reflet-bleu1" src="../../public/images/reflet3.svg">
<img class="reflet-jaune1" src="../../public/images/reflet2.svg">
<header id="nav-bar">
    <nav class="nav-bar">
        <div class="logo">
            <img src="../../public/images/logo.svg" alt="Notre logo">
            <h2>Biblio</h2>
        </div>
        <div>
            <ul class="nav-right">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Livre</a></li>
                <li><a href="#">Categorie</a></li>
                <li><a href="#">Demandes d'emprunt</a></li>
                <li><a href="../logout.php">Déconnexion</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <section class="user-management">
        <h2>Ajouter un Nouvel livre</h2>
        <form id="add-user-form" action="add_user.php" method="post">
            <label for="nom">Titre</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">jjjjj</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe </label>
            <input type="password" id="password" name="password" required>

            <label for="conf">confirmation mot de passe</label>
            <input type="password" id="conf" name="conf" required>

            <label for="role">Rôle:</label>
            <select id="role" name="role">
                <option value="bibliotehcaire">Bibliothécaire</option>
                <option value="administrateur">Administrateur</option>
            </select>

            <button type="submit" class="btn">Ajouter</button>
        </form>
    </section>

    <section class="user-list">
        <h2>Liste des Utilisateurs</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom d'utilisateur</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Connexion à la base de données
            require "../../Config/database.php";

            $conn = database();

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Échec de la connexion : " . $conn->connect_error);
            }

            // Requête pour obtenir tous les utilisateurs
            $sql = "SELECT * FROM livres";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher chaque utilisateur
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>" . $row["username"]. "</td>
                                <td>" . $row["role"]. "</td>
                                <td>
                                    <a href='edit_user.php?id=" . $row["id"]. "' class='edit-btn'><i class='fas fa-edit'></i></a>
                                    <a href='delete_user.php?id=" . $row["id"]. "' class='delete-btn'><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Aucun livres trouvé</td></tr>";
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