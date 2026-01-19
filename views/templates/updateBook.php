<?php

/**
 * Template pour affiche la page d'ajout de livre.
 */
?>
<div class="page">
<p class="back">Retour</p>
<h1>Modifier les informations</h1>

<div class="content">
    <div class="column1">
        <label>Photo</label>
        <img src="<?php echo $book->getPicture(); ?>" alt="image du livre <?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?>">
        <input type="file" id="bookPicture" accept="image/png, image/jpeg, image/svg">
        <a class="updatePicture" onclick="document.getElementById('bookPicture').click()">Modifier la photo</a>
    </div>
    <div class="column2">
        <form method="post" action="index.php?action=updateBook" enctype="multipart/form-data">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="title" value="<?php echo htmlspecialchars_decode($book->getTitle(), ENT_QUOTES); ?>">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="author" value="<?php echo htmlspecialchars_decode($book->getAuthor(), ENT_QUOTES); ?>">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="description"><?php echo htmlspecialchars_decode($book->getDescription(), ENT_QUOTES); ?></textarea>
            <label for="availability">Disponibilité</label>
            <select name="availability" id="availability" class="availability">
            <option value="available" <?php if (1 === $book->getAvailability()) {
                echo 'selected';
            } ?>>Disponible</option>
                <option value="unavailable" <?php if (0 === $book->getAvailability()) {
                    echo 'selected';
                } ?>>Non disponible</option>
            </select>
            <input type="submit" class="button" value="Valider">
            <input type="hidden" name="bookId" id="bookId" value="<?php echo $book->getId(); ?>">
        </form>
    </div>
</div>
</div>
