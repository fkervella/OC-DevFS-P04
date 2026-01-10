<?php

/**
 * Template pour afficher la page d'inscription.
 */
?>

<div class="content">
    <div class="column1">
        <h2>Inscription</h2>
        <form class="signIn" method="post" action="index.php?action=registerUser">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" class="pseudo" id="pseudo">
            <label for="login">Adresse email</label>
            <input type="text" name="login" class="login" id="login">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="password" id="password">
            <input type="submit" class="button" value="S'inscrire">
        </form>
        <p>Déjà inscrit ? <a href="index.php?action=showLogin">Connectez-vous</a></p>
    </div>
    <div class="column2">
        <img src="img/imageSignin.jpg" alt="image inscription">
    </div>
</div>
