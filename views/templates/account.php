<?php

/**
 * Template pour afficher la page d'accueil.
 */
?>

<div class="page">
<h1>Mon compte</h1>
<div class="content">
    <div class="row1">
        <div class="column1">
        <img id="avatar" src='<?php echo $avatar."?t=".time(); ?>' alt='avatar <?php echo $pseudo; ?>'>
        <input type="file" id="userAvatarFile" accept="image/png, image/jpeg, image/svg">
            <a onclick="document.getElementById('userAvatarFile').click()">modifier</a>
            <div class="pseudo">
                <?php echo $pseudo; ?>
            </div>
            <div class="memberSince">
            Membre depuis <?php echo $ecart; ?>
            </div>
            <p>Bibliothèque</p>
            <div class="librarySize">
                <img id="icon" src='img/iconeBibliotheque.svg' alt='icone bibliothèque'>
                <?php
                    if (0 === $bookNumber) {
                        echo 'Pas encore de livre';
                    } elseif (1 === $bookNumber) {
                        echo '1 livre';
                    } else {
                        echo $bookNumber.' livres';
                    }
?>
            </div>
            <a href="index.php?action=showAddBook">
                <div class="button">
                    Ajouter un livre
                </div>
            </a>
        </div>
        <div class="column2">
            <div class="title">
                Vos informations personnelles
            </div>
            <form method="post" action="index.php?action=updateUser" class="personalInfo">
                <label for="login">Adresse email</label>
                <input type="text" name="login" class="login" id="login" value="<?php echo $login; ?>">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="password" id="password">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" class="pseudo" id="pseudo" value="<?php echo $pseudo; ?>">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
                <input type="submit" class="button-reverse" value="Enregistrer">
            </form>

        </div>
    </div>
    <?php if ($bookNumber > 0) { ?>
        <div class="row2">
            <div class="grid-header">
                <div class="grid-header-cell hImage">Photo</div>
                <div class="grid-header-cell hTitle">Titre</div>
                <div class="grid-header-cell hAuthor">Auteur</div>
                <div class="grid-header-cell hDescription">Description</div>
                <div class="grid-header-cell hAvailability">Disponiblité</div>
                <div class="grid-header-cell hActions">Actions</div>
            </div>
    
            <?php
                $counter = 1;
        foreach ($books as $book) { ?>
                <div class="grid-row 
                    <?php if (Utils::isEven($counter)) {
                        echo 'evenRow';
                    } else {
                        echo 'oddRow';
                    }

            if ($counter === sizeof($books)) {
                echo ' lastRow';
            }

            ++$counter;
            ?>">
                <div class="grid-row-cell hImage">
                <img src="<?php
                                if (empty($book->getPicture())) {
                                    echo 'img/imageTest.png';
                                } else {
                                    echo $book->getPicture()."?t=".time();
                                } ?>" alt="couverture livre <?php echo $book->getTitle(); ?>">
                </div>
                <div class="grid-row-cell hTitle">
                <p class="bookTitle"><?php echo $book->getTitle(); ?></p>
                </div>
                <div class="grid-row-cell hAuthor">
                <p class="bookAuthor"><?php echo $book->getAuthor(); ?></p>
                </div>
                <div class="grid-row-cell hDescription">
                <p class="bookDescription"><?php echo $book->getDescription(); ?></p>
                </div>
                <div class="grid-row-cell hAvailability">
                    <?php if (1 === $book->getAvailability()) { ?>
                        <div class="available">disponible
                        </div>
                    <?php } else { ?>
                        <div class="unavailable">non dispo.
                        </div>
                    <?php }?>
                </div>
                <div class="grid-row-cell hActions">
                <a href="index.php?action=showUpdateBook&bookId=<?php echo $book->getId(); ?>" class="modifyBook">Editer</a>
                <a href="index.php?action=deleteBook&bookId=<?php echo $book->getId(); ?>" class="deleteBookFromLibrary" <?php echo Utils::askConfirmation('Etes-vous sûr de vouloir supprimer ce livre ?'); ?>>Supprimer</a>
                </div>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
</div>
