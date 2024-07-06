<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../../public/css/cards.css">
    <link rel="stylesheet" href="categorie-cards.css">
    <link rel="stylesheet" href="barCherche.css">
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
                <li><a href="index.php">Accueil</a></li>
                <li><a href="list_books.php">Chercher un Livre</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li><a href="#">Déconnexion<img src="../../public/images/IconlogoOut.svg"></a></li>

            </ul>
        </div>
    </nav>
</header>

<main>

    <div class="bar">
        <div class="chercher">
            <form id="searchForm" action="" method="POST">
                <select name="type-cherche" id="type-cherche">
                    <option value="genre">Genre</option>
                    <option value="titre">Titre</option>
                    <option value="anne">Année</option>
                    <option value="auteur">Auteur</option>
                </select>
                <input type="text" id="searchInput" name="recherche" placeholder="Rechercher...">
                <input type="submit" name="submit" value="Recherche">
            </form>
        </div>
    </div>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $type_recherche = $_POST['type-cherche'];
        $recherche = $_POST['recherche'];
        require "../../Config/database.php";

        $con = database();
        // Préparation de la requête SQL
        $stmt = $con->prepare("SELECT * FROM livres WHERE $type_recherche LIKE ?");
        $str = "%" . $recherche . "%";
        $stmt->bind_param('s', $str);
        $stmt->execute();
        $result = $stmt->get_result();

        ?>

        <section class="user-list">
            <h2>Liste des livres trouves</h2>
            <table>
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Genre</th>
                    <th>Annee de publication</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if ($result->num_rows > 0) {
                    // Afficher le resustat
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["titre"] . "</td>
                                <td>" . $row["auteur"] . "</td>
                                <td>" . $row["genre"] . "</td>
                               <td>" . $row["anne"] . "</td>
                               <td>
                                    <a href='#' >Envoyer une demande d'emprunt</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun livre trouvé</td></tr>";
                }

                ?>
                </tbody>
            </table>
        </section>

        <?php
        $stmt->close();
        $con->close();
    } else {
        ?>

        <div class="cards">
            <div class="text-center">
                <h1>Nos livres </h1>
                <h4 class="mb-5"><strong>Vivez dans le monde des imaginations</strong></h4>
            </div>
            <div class="container">
                <div class="card" style="width: 18rem;">
                    <img src="../../public/images/back1.jpg" class="card-img-top" alt="livre1">
                    <div class="card-body">
                        <h5 class="card-title">Eleanor Roosevelt</h5>
                        <p class="card-text">Vous gagnez en force, en courage et en confiance à chaque expérience où
                            vous arrêtez vraiment pour regarder la peur en face.</p>
                        <a href="../../Views/connexion.php" class="btn btn-primary">Empruntez</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="../../public/images/doLivre.jpg" class="card-img-top" alt="livre1">
                    <div class="card-body">
                        <h5 class="card-title"> Stacy Hawkins Adams</h5>
                        <p class="card-text">Dans les pages de son journal, elle a trouvé la liberté d'exprimer ses
                            passions les plus profondes et ses rêves les plus audacieux.</p>
                        <a href="../../Views/connexion.php" class="btn btn-primary">Empruntez</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="../../public/images/doLivre.jpg" class="card-img-top" alt="livre1">
                    <div class="card-body">
                        <h5 class="card-title">Barbara Hitchcock,</h5>
                        <p class="card-text">"Les tonalités uniques et la spontanéité des Polaroids en ont fait un
                            format photographique apprécié depuis des décennies.
                        </p>
                        <a href="../../Views/connexion.php" class="btn btn-primary">Empruntez</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

</main>

</body>
</html>
