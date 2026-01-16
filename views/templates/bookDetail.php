<?php

/**
 * Template pour afficher la page de détail d'un livre.
 */
?>
<div class="breadcrumb">
    <p><a href="index.php?action=showBookExchange">Nos livres</a> - The Kinfolk Table</p>
</div>
<div class="content">
    <div class="column1">
    <img src="<?php echo $book->getPicture()."?t=".time(); ?>" alt="image du livre <?php echo $book->getTitle(); ?>">
    </div>
    <div class="column2">
    <div class="title"><?php echo $book->getTitle(); ?>
        </div>
            <div class="author">Par <?php echo $book->getAuthor(); ?>
        </div>
        <p class="break">___</p>
        <p class="sectionTitle">Description</p>
        <div class="description">
            <?php echo Utils::format($book->getDescription()); ?>
        </div>
        <p class="sectionTitle">Propriétaire</p>
        <div class="userIcon">
        <img src="<?php echo $user->getAvatar()."?t=".time(); ?>" alt="avatar de <?php echo $user->getPseudo(); ?>">
            <p><?php echo $user->getPseudo(); ?></p>
        </div>
        <?php if ($user->getId() !== $_SESSION['userId']) { ?>
        <a href="index.php?action=showNewMessage&bookId=<?php echo $book->getId(); ?>">
            <div class="button">Envoyer un message
            </div>
        </a>
        <?php } ?>
    </div>
</div>
