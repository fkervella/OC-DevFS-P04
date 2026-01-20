<?php

/**
 * Template pour afficher la page de détail d'un livre.
 */
?>
<div class="breadcrumb">
<p><a href="index.php?action=showBookExchange">Nos livres</a><?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?></p>
</div>
<div class="content">
    <div class="column1">
    <img src="<?php echo $book->getPicture().'?t='.time(); ?>" alt="image du livre <?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?>">
    </div>
    <div class="column2">
    <div class="title"><?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?>
        </div>
            <div class="author">Par <?php echo htmlspecialchars_decode($book->getAuthor(), ENT_QUOTES); ?>
        </div>
        <p class="break">___</p>
        <p class="sectionTitle">Description</p>
        <div class="description">
            <?php echo Utils::format(htmlspecialchars_decode($book->getDescription(), ENT_QUOTES)); ?>
        </div>
        <p class="sectionTitle">Propriétaire</p>
        <a href="index.php?action=showAccount&userId=<?php echo $user->getId(); ?>">
            <div class="userIcon">
            <img src="<?php echo $user->getAvatar().'?t='.time(); ?>" alt="avatar de <?php echo htmlspecialchars_decode($user->getPseudo(), ENT_QUOTES); ?>">
                <p><?php echo htmlspecialchars_decode($user->getPseudo(), ENT_QUOTES); ?></p>
            </div>
        </a>
        <?php if (isset($_SESSION['userId']) && $user->getId() !== $_SESSION['userId']) { ?>
        <a href="index.php?action=showNewMessage&userId=<?php echo $book->getSellerId(); ?>">
            <div class="button">Envoyer un message
            </div>
        </a>
        <?php } ?>
    </div>
</div>
