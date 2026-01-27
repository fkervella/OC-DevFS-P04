<?php

/**
 * Template pour affiche la page d'ajout de livre.
 */
?>
<div class="page">
<p class="back">Retour</p>
<h1>Ajouter un livre</h1>

<div class="content">
    <div class="column1">
        <label>Photo</label>
        <img id="bookImage" src="" alt="image du livre	">
        <input type="file" id="bookPicture" accept="image/png, image/jpeg, image/svg">
        <a class="updatePicture" onclick="document.getElementById('bookPicture').click()">Modifier la photo</a>
    </div>
    <div class="column2">
        <form method="post" id="registerBook" action="index.php?action=registerBook" enctype="multipart/form-data">
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
            <input type="submit" id="submit" class="button" value="Enregistrer le livre">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
        </form>
    </div>
</div>
</div>
