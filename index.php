<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biblio</title>
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/accueil/header.css">
    <link rel="stylesheet" href="public/css/accueil/main.css">
    <link rel="stylesheet" href="public/css/accueil/footer.css">
    <link rel="stylesheet" href="public/css/accueil/cards.css">
</head>
<body>

<img class="reflet-vert" src="public/images/reflet1.svg">
<img class="reflet-bleu1" src="public/images/reflet3.svg">
<img class="reflet-bleu2" src="public/images/reflet3.svg">
<img class="reflet-jaune1" src="public/images/reflet2.svg">
<img class="reflet-jaune2" src="public/images/reflet2.svg">
<header >
    <nav class="nav-bar" id="nav-bar">
        <div class="logo">
            <img src="public/images/logo.svg" alt="Notre logo">
            <h2>Biblio</h2>
        </div>
        <div>
            <ul class="nav-right">
                <li><a href="#ecosyteme">Ecosystème</a></li>
                <li><a href="#contact">Nous-contactez</a></li>
                <li><a href="Views/connexion.php">Se Connecter <img src="public/images/IconlogoOut.svg"></a></li>
            </ul>
        </div>
    </nav>
</header>
<!--le main du page-->
<main>
    <div class="accueil">
        <div class="">
            <div>
                <h1><strong>Bienvenue</strong> sur Biblio !</h1>
                <p>

                    Explorez une vaste collection de livres,<br> des classiques aux nouveautés, adaptés à tous les goûts.<br> Trouvez des recommandations personnalisées,<br> lisez des critiques et rejoignez notre communauté de passionnés.<br> Plongez dans un monde de savoir et d'aventures littéraires dès maintenant.<br><br>

                    Bonne lecture avec Biblio ! </p>
            </div>
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-primary" href="Views/incriprion.php" type="button">S'inscrire</a>
            </div>
        </div>
        <div>
            <img src="public/images/livres.png">
        </div>
        <div>
            <h1>+100<strong>K</strong></h1>
            <p>Le lorem ipsum (également appelé faux-texte<br>
                lipsum, ou bolo bolo) est, en imprimerie,une </p>
        </div>
    </div>
    <div class="center">
        <img src="public/images/redcenter.svg">
    </div>
    <div class="a_propos_livre text-center mt-5 container" >
        <h1 class="mb-5 mt-5">Pourquoi Lire ?</h1>
        <h6><strong>Lire, c'est voyager sans quitter son fauteuil,</strong> disait Émile Zola. <br>Les livres sont des portails vers des mondes inconnus, des fenêtres sur l'âme humaine et des refuges pour l'esprit. En ouvrant un livre, vous embarquez pour une aventure où chaque page est une nouvelle découverte, chaque chapitre une étape vers l'inattendu.

            <br>Imaginez-vous plongé dans un roman captivant, où les personnages deviennent des amis intimes, où les intrigues vous tiennent en haleine et où chaque mot résonne comme une mélodie. Lire, c'est vivre mille vies, ressentir mille émotions et comprendre mille perspectives différentes. C'est un exercice d'empathie, une invitation à penser et à rêver.

            Victor Hugo disait : <strong>Lire, c'est boire et manger. L'esprit qui ne lit pas maigrit comme le corps qui ne mange pas.<br><br></strong> La lecture nourrit l'esprit, élargit les horizons et enrichit l'âme. Elle vous offre la possibilité de vous évader du quotidien, de découvrir des cultures lointaines, des idées révolutionnaires, et des histoires émouvantes.

            Prenez un livre et laissez-vous emporter par le pouvoir des mots.<br><br> <strong>Chaque livre est une promesse d'aventure</strong>, une source de connaissance et une opportunité de croissance personnelle. Embrassez la lecture, car comme le disait Jorge Luis Borges, <strong>Je ne peux me passer des livres comme je ne peux me passer de l'air.</strong>

            Plongez dans un livre aujourd'hui et laissez-le transformer votre vie. </h6>
    </div>
    <div class="emprunt" id="ecosyteme">
        <div class="container">
            <div>
                <h1>A propos de nos livres </h1>
                <h6>Découvrez notre collection exceptionnelle de livres disponibles à l'emprunt dans la bibliothèque. Nous offrons une vaste gamme de genres et de formats pour satisfaire tous les goûts et intérêts.<br>

                    -<strong>Classiques Littéraires</strong> : Plongez dans les chefs-d'œuvre intemporels qui ont marqué l'histoire de la littérature.<br>
                    -<strong>Romans Contemporains</strong> : Explorez les œuvres modernes qui captivent les lecteurs du monde entier.<br>
                    -<strong>Science-Fiction et Fantastique</strong> : Voyagez à travers des mondes imaginaires et futuristes remplis d'aventures.<br>
                    -<strong>Policiers et Thrillers</strong> : Ressentez le suspense avec des intrigues palpitantes et des mystères à résoudre.<br>
                    -<strong>Biographies et Mémoires</strong> : Apprenez des vies fascinantes et des expériences inspirantes.<br>
                    - <strong>Livres Jeunesse</strong> : Offrez à vos enfants des histoires magiques et éducatives.<br>
                    -<strong>Fiction</strong> : Élargissez vos connaissances avec des livres sur la science, l'histoire, la philosophie et bien plus.<br><br>

                    <h5><strong>Tous nos livres sont soigneusement sélectionnés pour offrir une lecture enrichissante et plaisante. Empruntez-les facilement et profitez de moments de lecture inoubliables.</strong></h5> </h6>
            </div>
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-primary" href="Views/connexion.php" type="button">Allez-emprunter</a>
            </div>
        </div>
    </div>
    <div class="cards">
        <div class="text-center">
            <h1>Nos livres </h1>
            <h4 class="mt-2 mb-5"><strong>Vivez dans le monde des imaginations</strong></h4>
        </div>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <img src="public/images/livre4.jpg" class="card-img-top" alt="livre1">
                <div class="card-body">
                    <h5 class="card-title">Eleanor Roosevelt</h5>
                    <p class="card-text">Vous gagnez en force, en courage et en confiance à chaque expérience où vous arrêtez vraiment pour regarder la peur en face. Vous êtes capable de vous dire : 'J'ai vécu cette horreur. Je peux affronter la prochaine chose qui viendra.' Vous devez faire la chose que vous pensez ne pas pouvoir faire.</p>
                    <a href="Views/connexion.php" class="btn btn-primary">Empruntez</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="public/images/livre2.jpg" class="card-img-top" alt="livre1">
                <div class="card-body">
                    <h5 class="card-title"> Stacy Hawkins Adams</h5>
                    <p class="card-text">Dans les pages de son journal, elle a trouvé la liberté d'exprimer ses passions les plus profondes et ses rêves les plus audacieux. Chaque mot écrit était un pas vers la découverte de soi et l'affirmation de son existence.</p>
                    <a href="Views/connexion.php" class="btn btn-primary">Empruntez</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="public/images/livre3.jpg   " class="card-img-top" alt="livre1">
                <div class="card-body">
                    <h5 class="card-title">Barbara Hitchcock,</h5>
                    <p class="card-text">"Les tonalités uniques et la spontanéité des Polaroids en ont fait un format photographique apprécié depuis des décennies. Imprégné de toute la chaleur et de la nostalgie d'un album de famille, cet hommage à l'appareil instantané présente des centaines d'images issues de la collection de la Polaroid Corporation."
                    </p>
                    <a href="Views/connexion.php" class="btn btn-primary">Empruntez</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="public/images/livre5.jpg   " class="card-img-top" alt="livre1">
                <div class="card-body">
                    <h5 class="card-title">Sandra Vensko</h5>
                    <p class="card-text">Ce livre est une œuvre de prose brève écrite sous forme de journal intime, explorant les nuances des relations humaines à travers différentes étapes de la vie. Il s'agit d'une conversation ouverte sur la solitude, les limites de la dualité et la manière de les surmonter ou de les accepter</p>
                    <a href="Views/connexion.php" class="btn btn-primary">Empruntez</a>
                </div>
            </div>
        </div>
    </div>
    <div class="about">
        <div class="container">
            <div class="foto">
                <img src="public/images/about.png">
            </div>
            <div class="presentation">
                <h1 class="mt-5 mb-5">A propos de nous</h1>
                <p>La bibliothèque <strong>Biblio</strong> est une <strong>merveille architecturale et un sanctuaire du savoir situé au cœur d'une métropole vibrante</strong>. Dès l'entrée, on est accueilli par une façade moderne en verre et en acier, ornée de sculptures contemporaines symbolisant la quête de la connaissance.
                    À l'intérieur, un <strong>atrium lumineux</strong> s'étend sur plusieurs étages, baigné de lumière naturelle grâce à un toit en verre. Des jardins suspendus ajoutent une touche de verdure et de tranquillité à l'environnement. Les étagères, élégamment conçues en bois et en métal, sont remplies de livres de tous genres, allant des <strong> manuscrits anciens aux dernières parutions en science et technologie</strong>.
                    Des espaces de lecture confortables sont disséminés un peu partout, équipés de fauteuils moelleux et de tables ergonomiques. Un café littéraire invite les visiteurs à se détendre avec une boisson chaude tout en feuilletant leurs livres préférés.
                    <strong>Biblio</strong> dispose également de salles de conférences modernes, où des auteurs et des chercheurs de renommée mondiale viennent partager leurs connaissances. Une section multimédia high-tech offre un accès à des ressources numériques et des technologies de réalité virtuelle, <strong>permettant aux utilisateurs de vivre des expériences immersives</strong>.
                    <strong>Les enfants</strong> ne sont pas en reste, avec <strong>un espace spécialement</strong> dédié à eux, rempli de <strong>livres illustrés</strong>, de <strong>jeux éducatifs et d'ateliers créatifs</strong>. Des bibliothécaires passionnés et bien informés sont toujours prêts à aider les visiteurs à trouver exactement ce qu'ils cherchent.
                </p>
            </div>
        </div>
    </div>
    <div class="center mt">
        <img src="public/images/redcenter.svg">
    </div>
</main>

<footer id="contact">
    <div class="container footer">
        <h1 class="text-center mb-5">Nous-contactez</h1>
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Adresse e-mail </label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-4">
            <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
            <textarea class="form-control" placeholder="Votre message ici" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="button">Envoyer</button>
        </div>
    </div>
</footer>

<div class="bas-page">

</div>
<script src="public/js/script.js"></script>
</body>
</html>