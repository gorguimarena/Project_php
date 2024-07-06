<?php
require "../../Config/database.php";
// Connexion à la base de données
$conn = database();

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    // Requête pour mettre à jour l'utilisateur
    $sql = "UPDATE users SET username='$username', role='$role' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur modifié avec succès";
    } else {
        echo "Erreur : " . $conn->error;
    }

    $conn->close();
    header('Location: utilisateur.php'); // Rediriger vers la page principale
} else {
    // Récupérer l'ID de l'utilisateur à modifier
    $id = $_GET['id'];

    // Requête pour obtenir les informations de l'utilisateur
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Afficher le formulaire de modification
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier Utilisateur</title>
            <link rel="stylesheet" href="../../Test/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        </head>
        <body>
        <header>
            <h1>Gestion des Membres</h1>
            <nav>
                <ul>
                    <li><a href="../../Test/index.php">Accueil</a></li>
                    <li><a href="../../Test/utilisateur.php">Utilisateurs</a></li>
                    <li><a href="../../Test/index.php">Bibliothécaires</a></li>
                    <li><a href="../../Test/utilisateur.php">Administrateurs</a></li>
                    <li><a href="../logout.php">Déconnexion</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section class="user-management">
                <h2>Modifier Utilisateur</h2>
                <form action="edit_user.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="username">Nom d'utilisateur:</label>
                    <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>

                    <label for="prenom">Prenom d'utilisateur:</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>" required>

                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" required>

                    <label for="password">Mot de passe:</label>
                    <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>" required>

                    <label for="role">Rôle:</label>
                    <select id="role" name="role">
                        <option value="utilisateur" <?php if($row['role'] == 'utilisateur') echo 'selected'; ?>>Utilisateur</option>
                        <option value="bibliothecaire" <?php if($row['role'] == 'bibliothecaire') echo 'selected'; ?>>Bibliothécaire</option>
                        <option value="administrateur" <?php if($row['role'] == 'administrateur') echo 'selected'; ?>>Administrateur</option>
                    </select>

                    <button type="submit" class="btn">Modifier</button>
                </form>
            </section>
        </main>
        </body>
        </html>

        <?php
    } else {
        echo "Utilisateur non trouvé";
    }

    $conn->close();
}
?>
