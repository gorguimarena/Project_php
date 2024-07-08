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
    $titre = $_POST['titre'];
    $nom = $_POST['auteur'];
    $anne = $_POST['anne'];
    $nb_exemplaire = $_POST['nb_exemplaire'];
    $genre = $_POST['genre'];

    // Préparer la requête
    $sql = "UPDATE livres SET titre='$titre',auteur='$nom',anne='$anne',nb_exemplaire='$nb_exemplaire',genre='$genre' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Utilisateur modifié avec succès";
    } else {
        echo "Erreur : " . $conn->error;
    }

    $conn->close();
    header('Location: list_livre.php'); // Rediriger vers la page principale
} else {
    // Récupérer l'ID de l'utilisateur à modifier
    $id = $_GET['id'];

    // Requête pour obtenir les informations de l'utilisateur
    $sql = "SELECT * FROM livres WHERE id='$id'";
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

        <main>
            <section class="user-management">
                <h2>Modifier Livre</h2>
                <form action="edit_livre.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" value="<?php echo $row['titre']; ?>" required>

                    <label for="auteur">Nom de l'auteur</label>
                    <input type="text" id="auteur" name="auteur" value="<?php echo $row['auteur']; ?>" required>

                    <label for="anne">Annee de publication</label>
                    <input type="date" id="anne" name="anne" value="<?php echo $row['anne']; ?>" required>

                    <label for="nb_exemplaire">Nombre d'exemplaire</label>
                    <input type="number" id="nb_exemplaire" name="nb_exemplaire" value="<?php echo $row['nb_exemplaire']; ?>" required>

                    <label for="genre">Genre</label>
                    <select id="genre" name="genre">

                        <option value="<?php ?>" <?php if($row['status'] == 'utilisateur') echo 'selected'; ?>>Utilisateur</option>
                    </select>
                    <button type="submit" name="submit" class="btn">Modifier</button>
                </form>
            </section>
        </main>
        </body>
        </html>

        <?php
    } else {
        echo "livre non trouvé";
    }

    $conn->close();
}
?>
