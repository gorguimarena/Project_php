<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Membres de la Bibliothèque</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <h1>Gestion des Membres</h1>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Utilisateurs</a></li>
            <li><a href="#">Bibliothécaires</a></li>
            <li><a href="#">Administrateurs</a></li>
            <li><a href="#">Déconnexion</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="user-management">
        <h2>Ajouter un Nouvel Utilisateur</h2>
        <form id="add-user-form" action="add_user.php" method="post">
            <label for="nom">Nom d'utilisateur:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prenom d'utilisateur</label>
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
            $conn = new mysqli('localhost', 'root', '', 'library');

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Échec de la connexion : " . $conn->connect_error);
            }

            // Requête pour obtenir tous les utilisateurs
            $sql = "SELECT id, username, role FROM users";
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
                echo "<tr><td colspan='4'>Aucun utilisateur trouvé</td></tr>";
            }

            $conn->close();
            ?>
            </tbody>
        </table>
    </section>
</main>
<footer>
    <p>&copy; 2024 Bibliothèque. Tous droits réservés.</p>
</footer>
</body>
</html>
