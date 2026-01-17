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
        <img id="avatar" src='<?php echo $avatar.'?t='.time(); ?>' alt='avatar <?php echo $pseudo; ?>'>
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
        <a href="index.php?action=showNewMessage&userId=<?php echo $userId; ?>">
            <div class="button-reverse">
                Ecrire un message
            </div>
        </a>
    </div>
    <div class="column2">

<?php if ($bookNumber > 0) { ?>
        <div class="grid-header">
            <div class="grid-header-cell hImage">Photo</div>
            <div class="grid-header-cell hTitle">Titre</div>
            <div class="grid-header-cell hAuthor">Auteur</div>
            <div class="grid-header-cell hDescription">Description</div>
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
                <div class="grid-row-cell hImage"><a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>">
                <img src="<?php
                            if (empty($book->getPicture())) {
                                echo 'img/imageTest.png';
                            } else {
                                echo $book->getPicture().'?t='.time();
                            } ?>" alt="couverture livre <?php echo $book->getTitle(); ?>">
                </a>
                </div>
                <div class="grid-row-cell hTitle">
                <p class="bookTitle"><a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>"><?php echo $book->getTitle(); ?></a></p>
                </div>
                <div class="grid-row-cell hAuthor">
                <p class="bookAuthor"><a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>"><?php echo $book->getAuthor(); ?></a></p>
                </div>
                <div class="grid-row-cell hDescription">
                <p class="bookDescription"><a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>"><?php echo $book->getDescription(); ?></a></p>
                </div>
            </div>
            <?php } ?>
    <?php } ?>


        </div>
    </div>
    </div>
</div>
