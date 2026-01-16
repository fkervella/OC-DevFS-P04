<?php

/**
 * Template pour affiche la page d'ajout de livre.
 */
?>

<div class="content">
    <div class="column2">
    <h1>Modifier le livre <?php echo $book->getTitle(); ?></h1>
        <form method="post" action="index.php?action=updateBook" enctype="multipart/form-data">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="title" value="<?php echo $book->getTitle(); ?>">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="author" value="<?php echo $book->getAuthor(); ?>">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="description"><?php echo $book->getDescription(); ?></textarea>
            <label for="availability">Disponibilité</label>
            <select name="availability" id="availability" class="availability">
            <option value="available" <?php if (1 === $book->getAvailability()) {
                echo 'selected';
            } ?>>Disponible</option>
                <option value="unavailable" <?php if (0 === $book->getAvailability()) {
                    echo 'selected';
                } ?>>Non disponible</option>
            </select>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/svg">
            <input type="submit" class="button" value="Enregistrer le livre">
            <input type="hidden" name="bookId" value="<?php echo $book->getId(); ?>">
        </form>
    </div>
</div>
