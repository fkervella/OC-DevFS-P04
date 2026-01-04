<?php

/**
 * \brief Contient la logique de l'entité User.
 */
class UserController
{
    /**
     * Affiche la page d'inscription.
     */
    public function showSignIn(): void
    {
        $view = new View('Sign in');
        $view->render('signin', [], 'signin.css');
    }

    /**
     * Affiche la page de connexion.
     */
    public function showLogIn(): void
    {
        $view = new View('Log In');
        $view->render('login', [], 'login.css');
    }
}
