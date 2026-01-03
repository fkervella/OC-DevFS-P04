<?php

/**
 * Template pour afficher la page d'inscription
 */
?>

<div class="content">
    <div class="column1">
        <h2>Inscription</h2>
        <form class="signIn">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="pseudo" id="pseudo">
            <label for="mail">Adresse email</label>
            <input type="text" class="mail" id="mail">
            <label for="password">Mot de passe</label>
            <input type="password" class="password" id="password">
            <input type="submit" class="button" value="S'inscrire">
        </form>
        <p>Déjà inscrit ? <a href="index.php?action=showLogin">Connectez-vous</a></p>
    </div>
    <div class="column2">
        <img src="img/imageSignin.jpg" alt="image inscription">
    </div>
</div>
