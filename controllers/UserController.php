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

    /**
     * Déconnecte l'utilisateur courant
     */
    public function logOut():void
    {
        unset($_SESSION['user']);
        unset($_SESSION['userId']);

        $view = new View('welcome');
        $view->render('welcome', [], 'welcome.css');
    }
    /**
     * Affiche la page du compte utilisateur.
     */
    public function showAccount(int $userId): void
    {
        $view = new View('account');      
        $view->render('account', [], 'account.css');
    }

    /**
     * Connexion de l'utilisateur.
     */
    public function connectUser(): void
    {
        // Récupération des données du formulaire
        $login = Utils::request('login');
        $password = Utils::request('password');

        // Vérification que les données soient valides
        if (empty($login) || empty($password)) {
            throw new Exception("L'adresse email et le mot de passe doivent être saisis.");
        }

        // Vérification que l'utilisateur existe
        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($login);
        if (!$user) {
            throw new Exception("L'utilisateur indiqué n'est pas enregistré");
        }

        // Vérification que le mot de passe soit correct
        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            throw new Exception("Le mot de passe est incorrect : {$hash}");
        }

        // Connexion de l'utilisateur
        $_SESSION['user'] = $user;
        $_SESSION['userId'] = $user->getId();

        // Redirection vers la page du compte utilisateur
        Utils::redirect('showAccount&userId='.$user->getId());
    }
}
