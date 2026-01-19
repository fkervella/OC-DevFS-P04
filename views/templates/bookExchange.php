<?php

/**
 * Template pour afficher la page des livres à l'échange.
 */
?>

<div class='top'>

    <h1>Nos livres à l'échange</h1>
    <div class='search'>
        <img src='img/chercher.png' alt='recherche'>
        <form method="get" id="searchForm">
            <label for="searchWords">Recherche :</label>
            <input type="text" class="searchWords" name="searchWords" id="searchWords" placeholder="Rechercher un livre">
        </form>
    </div>
</div>

<div class='content'>
    <div class='bookCards'>
        <?php foreach ($books as $book) { ?>
            <div class="bookCard">
                <a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>">
                <div class="imageContainer"><img src="<?php echo $book->getPicture().'?t='.time(); ?>" alt="image livre <?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?>"></div>
                <?php if (0 === $book->getAvailability()) { ?>
                <div class="unavailable">non dispo.
                </div>
                <?php } ?>
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
</div>
