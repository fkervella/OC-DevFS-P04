<?php

/**
 * Template pour affiche la page d'ajout de livre.
 */
?>

<div class="content">
    <div class="column2">
        <h1>Ajouter un livre</h1>
        <form method="post" action="index.php?action=registerBook" enctype="multipart/form-data">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="title">
            <label for="author">Auteur</label>
            <input type="text" name="author" id="author" class="author">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="description"></textarea>
            <label for="availability">Disponibilité</label>
            <select name="availability" id="availability" class="availability">
                <option value="available">Disponible</option>
                <option value="unavailable">Non disponible</option>
            </select>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/png, image/jpeg, image/svg">
            <input type="submit" class="button" value="Enregistrer le livre">
            <input type="hidden" name="userId" value="1">
        </form>
    </div>
</div>
