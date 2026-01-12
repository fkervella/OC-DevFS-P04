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
        <img id="avatar" src='<?php echo $avatar; ?>' alt='avatar <?php echo $pseudo; ?>'>
            <a href="">modifier</a>
            <div class="pseudo">
                <?php echo $pseudo; ?>
            </div>
            <div class="memberSince">
            Membre depuis <?php echo $ecart; ?>
            </div>
            <p>Bibliothèque</p>
            <div class="librarySize">
                <img id="icon" src='img/iconeBibliotheque.svg' alt='icone bibliothèque'>
                4 livres
            </div>
            <a href="index.php?action=addBook">
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
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                <input type="submit" class="button-reverse" value="Enregistrer">
            </form>

        </div>
    </div>
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

    if ($counter === sizeof($books) - 1) {
        echo ' lastRow';
    }

    ++$counter;
    ?>">
            <div class="grid-row-cell hImage">
            <img src="<?php 
                            if (empty($book->getPicture())) {
                                echo 'img/imageTest.png';
                            } else {
                                echo$book->getPicture();
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
            <a href="index.php?action=modifyBook&bookId=<?php echo $book->getId(); ?>" class="modifyBook">Editer</a>
            <a href="index.php?action=deleteBook&bookId=<?php echo $book->getId(); ?>" class="deleteBookFromLibrary">Supprimer</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>
