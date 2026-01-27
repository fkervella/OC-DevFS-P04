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
        <?php
            if (isset($additionalStyle) && !empty($additionalStyle)) {
                echo "<link rel='stylesheet' href='./css/{$additionalStyle}'>";
            }

if (isset($viewScript) && !empty($viewScript)) {
    echo "<script src=\"./script/{$viewScript}\" defer></script>";
}
?>
        <script src="./script/menu.js" defer></script>
    </head>

    <body>
        <header>
            <nav class="screenMenu">
                <div class="logo">
                    <a href='index.php?action=showHome'><img src='img/logo.svg' alt='Tomtroc logo'></a>
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
                        } ?>><img class="headerIcon" src="img/iconeMessagerie.svg" alt="icone Messagerie">Messagerie <div class="messageNumber"><?php echo $notViewedMessagesNumber; ?></div></a>
                            <a href='index.php?action=showAccount' <?php if ('account' === $viewName) {
                                echo 'class="activePage"';
                            } ?>><img class="headerIcon" src="img/iconeMonCompte.svg" alt="icone mon compte">Mon compte</a>
                        <a href='index.php?action=showLogOut'>Déconnexion</a>
                    <?php } else { ?>
                        <a href='index.php?action=showLogIn' <?php if ('login' === $viewName) {
                            echo 'class="activePage"';
                        } ?>>Connexion</a>
                    <?php } ?>

                </div>
            </nav>
            <nav class="responsiveMenu" id="responsiveMenu">
                <div class="bar">
                    <div class="logo">
                        <a href='index.php'><img src='img/logo.svg' alt='Tomtroc logo'></a>
                    </div>
     
                    <div class="burgerMenu" id="burgerMenu">
                        <img src='img/iconMenu.svg' alt='icône menu'>
                    </div>
                </div>

                <ul class="menuContent" id="menuContent">
                    <li>
                        <a href='index.php?action=showHome'>Accueil</a>
                    </li>
                    <li>
                        <a href='index.php?action=showBookExchange'>Nos livres à l'échange</a>
                    </li>
                    <?php if ($userConnected) { ?>
                        <li>
                            <a href='index.php?action=showChat'>Messagerie <div class="messageNumber"><?php echo $notViewedMessagesNumber; ?></div></a>
                        </li>
                        <li>
                            <a href='index.php?action=showAccount'>Mon compte</a>
                        </li>
                        <li>
                            <a href='index.php?action=showLogOut'>Déconnexion</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href='index.php?action=showLogIn'>Connexion</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </header>

        <main>
            <?php echo $content; /* Ici est affiché le contenu réel de la page. */ ?>
        </main>

        <footer>
            <div class="box">
                <a href='index.php?action=showConfidentiality'>Politique de confidentialité</a>
            </div>
            <div class="box">
                <a href='index.php?action=showLegal'>Mentions légales</a>
            </div>
            <div class="box">
                <a href='index.php?action=showHome'>TomTroc©</a>
            </div>
            <div class="logoFooter">
                <a href='index.php?action=showHome'>
                    <div class="element1"><img src="img/T.png" alt="T"></div>
                    <div class="element2"><img src="img/T.png" alt="T"></div>
                </a>
            </div>
        </footer>
    </body>
</html>
