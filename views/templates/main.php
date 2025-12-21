<?php

/**
 * Ce fichier est le template principal qui contient ce qui a été généré par les autres vues.
 *
 * Les variables qui doivent impérativement être définies sont :
 *  $title string : titre de la page
 *  $content string: contenu de la page
 */

?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tomtroc</title>
        <link rel= "stylesheet" href="./css/style.css">
    </head>

    <body>
        <header>
            <nav>
                <a href='index.php'>TomTroc</a>
                <a href='index.php'>Accueil</a>
                <a href='index.php'>Nos livres à l'échange</a>
                <a href='index.php'>Messagerie</a>
                <a href='index.php'>Mon compte</a>
                <a href='index.php'>Connexion</a>
            </nav>
        </header>

        <main>
            <?= $content /*Ici est affiché le contenu réel de la page. */?>
        </main>

        <footer>
            <a href='index.php'>Politique de confidentialité</a>
            <a href='index.php'>Mentions légales</a>
            <a href='index.php'>TomTroc©</a>
            <a href='index.php'>TomTroc</a>
        </footer>
    </body>
</html>
