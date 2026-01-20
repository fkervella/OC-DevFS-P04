<?php

/**
 * Template pour afficher la page d'accueil.
 */
?>

    <div class="introduction">
        <div class="content">
            <div class="column1">
                    <h1>Rejoignez nos lecteurs passionnés</h1>
                <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
                <div class="button">
                    <a href='index.php?action=showLogIn'>Découvrir</a>
                </div>
            </div>
            <div class="column2">
                <div class="">
                    <img src="img/imageAccueil.jpg" alt="Image accueil">
                </div>
                <div class="legend">
                    Hamza
                </div>
            </div>
        </div>
    </div>
    
    <div class="lastAddedBooks">
        <div class="content">
            <h1>Les derniers livres ajoutés</h1>
            <div class="bookCards">
                <?php foreach ($books as $book) { ?>
                <div class="bookCard">
                    <a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>">
                    <div class="imageContainer">
                        <img src="<?php echo $book->getPicture(); ?>" alt="image1">
                    </div>
                    <div class="title">
                        <?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?>
                    </div>
                        <div class="author"><?php echo htmlspecialchars_decode($book->getAuthor(), ENT_QUOTES); ?>
                        </div>
                            <div class="seller">Vendu par : <?php echo htmlspecialchars_decode($book->getSellerPseudo(), ENT_QUOTES); ?>
                        </div>
                    </a>
                </div>

                <?php } ?>
            </div>
            <div class="button">
                <a href='index.php?action=showBookExchange'>Voir tous les livres</a>
            </div>
        </div>
    </div>
    
    <div class="howDoesItWork">
        <div class="content">
            <h1>Comment ça marche ?</h1>
            <p>Echanger des livres avec Tomtroc c'est simple et amusant ! Suivez ces étapes pour commencer :</p>
            <ul>
                <li>Inscrivez-vous gratuitement sur notre plateforme.</li>
                <li>Ajoutez à votre profil les livres que vous souhaitez échanger.</li>
                <li>Parcourez les livres disponibles chez d'autres membres.</li>
                <li>Proposez un échange et discutez avec d'autres passionnés de lecture.</li>
            </ul>
            <div class="button-reverse">
                <a href='index.php?action=showBookExchange'>Voir tous les livres</a>
            </div>
        </div>
    </div>
    
    <div class="landscapePicture">
    </div>
    
    <div class="values">
        <div class="content">
            <h1>Nos valeurs</h1>
            <div class="text">
                <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
                <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
                <p>Nous sommes passionés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
            </div>
            <div class="legend">
            L'équipe Tom Troc
            </div>
            <div class="pictureContainer">
                <img src="img/coeur.svg" alt="coeur accueil">
            </div>
        </div>
    </div>
