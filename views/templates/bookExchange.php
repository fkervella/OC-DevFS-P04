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
                <img src="<?php echo $book->getPicture().'?t='.time(); ?>" alt="image1">
                <div class="title">
                    <?php echo $book->getTitle(); ?>
                </div>
                    <div class="author"><?php echo $book->getAuthor(); ?>
                    </div>
                        <div class="seller">Vendu par : <?php echo $book->getSellerPseudo(); ?>
                    </div>
                </a>
            </div>
            <?php } ?>
    </div>
</div>
