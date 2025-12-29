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
        <link rel='stylesheet' href='./css/style.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <?php if (isset($additionalStyle) && !empty($additionalStyle))
                echo "<link rel='stylesheet' href='./css/{$additionalStyle}'>";
        ?>
    </head>

    <body>
        <header>
            <nav>
                <div class="logo">
                    <a href='index.php'><img src='img/logo.svg' alt='Tomtroc logo'></a>
                </div>
                <div class="menu">
                    <a href='index.php?action=showHome'>Accueil</a>
                    <a href='index.php'>Nos livres à l'échange</a>
                </div>
                <div class="menu">
                    <a href='index.php'>Messagerie</a>
                    <a href='index.php'>Mon compte</a>
                    <a href='index.php'>Connexion</a>
                </div>
                <div class="burgerMenu">
                    <a href='index.php'><img src='img/iconMenu.svg' alt='icône menu'></a>
            </nav>
        </header>

        <main>
            <?php echo $content; /* Ici est affiché le contenu réel de la page. */ ?>
        </main>

        <footer>
            <div class="box">
                <a href='index.php'>Politique de confidentialité</a>
            </div>
            <div class="box">
                <a href='index.php'>Mentions légales</a>
            </div>
            <div class="box">
                <a href='index.php'>TomTroc©</a>
            </div>
            <div class="logoFooter">
                <a href='index.php'>
                    <div class="element1"><img src="img/T.png" alt="T"></div>
                    <div class="element2"><img src="img/T.png" alt="T"></div>
                </a>
            </div>
        </footer>
    </body>
</html>
