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
        <title>Tomtroc - <?php echo $title; ?></title>
        <link rel='stylesheet' href='./css/style.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <?php if (isset($additionalStyle) && !empty($additionalStyle)) {
            echo "<link rel='stylesheet' href='./css/{$additionalStyle}'>";
        }
?>
    </head>

    <body>
        <header>
            <nav>
                <div class="logo">
                    <a href='index.php'><img src='img/logo.svg' alt='Tomtroc logo'></a>
                </div>
                <div class="menu">
                <a href='index.php?action=showHome' <?php if ('welcome' === $viewName) {
                    echo 'class="activePage"';
                } ?>>Accueil</a>
                    <a href='index.php?action=showBookExchange' <?php if ('bookExchange' === $viewName) {
                        echo 'class="activePage"';
                    } ?>>Nos livres à l'échange</a>
                </div>
                <div class="menu">
                    <?php if ($userConnected) { ?>
                        <a href='index.php?action=showChat' <?php if ('chat' === $viewName) {
                            echo 'class="activePage"';
                        } ?>><img class="headerIcon" src="img/iconeMessagerie.svg" alt="icone Messagerie">Messagerie</a>
                        <a href='index.php?action=showAccount&userId=1' <?php if ('account' === $viewName) {
                            echo 'class="activePage"';
                        } ?>><img class="headerIcon" src="img/iconeMonCompte.svg" alt="icone mon compte">Mon compte</a>
                        <a href='index.php?action=showLogOut'>Déconnexion</a>
                    <?php } else { ?>
                        <a href='index.php?action=showLogIn' <?php if ('login' === $viewName) {
                            echo 'class="activePage"';
                        } ?>>Connexion</a>
                    <?php } ?>

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
