<?php

/**
 * Template pour afficher la page de connexion.
 */
?>

<div class="content">
    <div class="column1">
        <h1>Connexion</h1>
        <form class="signIn" method="post" action="index.php?action=connectUser">
            <label for="login">Adresse email</label>
            <input name="login"type="text" class="login" id="login" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="password" id="password" required>
            <input type="submit" class="button" value="Se connecter">
        </form>
        <p>Pas de compte ? <a href="index.php?action=showSignIn">Inscrivez-vous</a></p>
    </div>
    <div class="column2">
        <img src="img/imageLogin.jpg" alt="image connexion">
    </div>
</div>
