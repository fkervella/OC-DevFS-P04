<?php

/**
 * Template pour afficher la page des livres à l'échange.
 */
?>

<div class='top'>

    <h1>Nos livres à l'échange</h1>
    <div class='search'>
        <img src='img/chercher.png' alt='recherche'>
        <form method="get" action="index.php?action=showBookExhange">
            <label for="searchWords">Recherche :</label>
            <input type="text" class="searchWords" name="searchWords" id="searchWords" value="Rechercher un livre">
        </form>
    </div>
</div>

<div class='content'>
    <div class='bookCards'>
        <?php foreach ($books as $book) { ?>
            <div class="bookCard">
                <a href="index.php?action=showBookDetail&bookId=<?php echo $book->getId(); ?>">
                <img src="<?php if (empty($book->getPicture())) {
                    echo 'img/imageTest.png';
                } else {
                    echo $book->getPicture();
                }
            ?>" alt="image1">
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

<!--


        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=1">
                <img src="img/imageTest.png" alt="image1">
                <div class="title">Image 1
                </div>
                <div class="author">Auteur 1
                </div>
                <div class="seller">Vendu par : vendeur 1
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=2">
                <img src="img/imageTest.png" alt="image2">
                <div class="title">Image 2
                </div>
                <div class="author">Auteur 2
                </div>
                <div class="seller">Vendu par : vendeur 2
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=3">
                <img src="img/imageTest.png" alt="image3">
                <div class="title">Image 3
                </div>
                <div class="author">Auteur 3
                </div>
                <div class="seller">Vendu par : vendeur 3
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=4">
                <img src="img/imageTest.png" alt="image4">
                <div class="title">Image 4
                </div>
                <div class="author">Auteur 4
                </div>
                <div class="seller">Vendu par : vendeur 4
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=5">
                <img src="img/imageTest.png" alt="image5">
                <div class="title">Image 5
                </div>
                <div class="author">Auteur 5
                </div>
                <div class="seller">Vendu par : vendeur 5
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=6">
                <img src="img/imageTest.png" alt="image6">
                <div class="title">Image 6
                </div>
                <div class="author">Auteur 6
                </div>
                <div class="seller">Vendu par : vendeur 6
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=7">
                <img src="img/imageTest.png" alt="image7">
                <div class="title">Image 7
                </div>
                <div class="author">Auteur 7
                </div>
                <div class="seller">Vendu par : vendeur 7
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=8">
                <img src="img/imageTest.png" alt="image8">
                <div class="title">Image 8
                </div>
                <div class="author">Auteur 8
                </div>
                <div class="seller">Vendu par : vendeur 8
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=9">
                <img src="img/imageTest.png" alt="image9">
                <div class="title">Image 9
                </div>
                <div class="author">Auteur 9
                </div>
                <div class="seller">Vendu par : vendeur 9
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=10">
                <img src="img/imageTest.png" alt="image10">
                <div class="title">Image 10
                </div>
                <div class="author">Auteur 10
                </div>
                <div class="seller">Vendu par : vendeur 10
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=11">
                <img src="img/imageTest.png" alt="image11">
                <div class="title">Image 11
                </div>
                <div class="author">Auteur 11
                </div>
                <div class="seller">Vendu par : vendeur 11
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=12">
                <img src="img/imageTest.png" alt="image12">
                <div class="title">Image 12
                </div>
                <div class="author">Auteur 12
                </div>
                <div class="seller">Vendu par : vendeur 12
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=13">
                <img src="img/imageTest.png" alt="image13">
                <div class="title">Image 13
                </div>
                <div class="author">Auteur 13
                </div>
                <div class="seller">Vendu par : vendeur 13
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=14">
                <img src="img/imageTest.png" alt="image14">
                <div class="title">Image 14
                </div>
                <div class="author">Auteur 14
                </div>
                <div class="seller">Vendu par : vendeur 14
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=15">
                <img src="img/imageTest.png" alt="image15">
                <div class="title">Image 15
                </div>
                <div class="author">Auteur 15
                </div>
                <div class="seller">Vendu par : vendeur 15
                </div>
            </a>
        </div>
        <div class="bookCard">
            <a href="index.php?action=showBookDetail&bookId=16">
                <img src="img/imageTest.png" alt="image16">
                <div class="title">Image 16
                </div>
                <div class="author">Auteur 16
                </div>
                <div class="seller">Vendu par : vendeur 16
                </div>
            </a>
        </div>-->
    </div>
</div>
