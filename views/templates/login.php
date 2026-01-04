<?php

/**
 * Template pour afficher la page de connexion.
 */
?>

<div class="content">
    <div class="column1">
        <h2>Connexion</h2>
        <form class="signIn">
            <label for="mail">Adresse email</label>
            <input type="text" class="mail" id="mail">
            <label for="password">Mot de passe</label>
            <input type="password" class="password" id="password">
            <input type="submit" class="button" value="Se connecter">
        </form>
        <p>Pas de compte ? <a href="index.php?action=showSignIn">Inscrivez-vous</a></p>
    </div>
    <div class="column2">
        <img src="img/imageLogin.jpg" alt="image connexion">
    </div>
</div>
