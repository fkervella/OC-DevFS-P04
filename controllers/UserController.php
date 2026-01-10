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
        $view = new View('Inscription');
        $view->render('signin', [], 'signin.css');
    }

    /**
     * Affiche la page de connexion.
     */
    public function showLogIn(): void
    {
        $view = new View('Connexion');
        $view->render('login', [], 'login.css');
    }

    /**
     * Déconnecte l'utilisateur courant.
     */
    public function logOut(): void
    {
        unset($_SESSION['user'], $_SESSION['userId']);

        $view = new View('Accueil');
        $view->render('welcome', [], 'welcome.css');
    }

    /**
     * Affiche la page du compte utilisateur.
     */
    public function showAccount(int $userId): void
    {
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);

        $pseudo = htmlspecialchars($user->getPseudo());
        $login = htmlspecialchars($user->getLogin());
        $avatar = htmlspecialchars($user->getAvatar());
        $userId = $user->getId();

        $view = new View('Mon compte');
        $view->render('account', [
            'pseudo' => $pseudo,
            'login' => $login,
            'avatar' => $avatar,
            'userId' => $userId,
        ], 'account.css');
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

    /**
     * Enregistre un nouvel utilisateur.
     */
    public function registerUser(): void
    {
        // Récupération des données du formulaire
        $pseudo = htmlspecialchars(Utils::request('pseudo'));
        $login = htmlspecialchars(Utils::request('login'));
        $password = htmlspecialchars(Utils::request('password'));

        // Vérification que les données soient valides
        if (empty($pseudo) || empty($login) || empty($password)) {
            throw new Exception("Le pseudo, l'adresse mail et le mot de passe doivent être saisis.");
        }

        // Validation des données saisies
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse mail saisie n'est pas valide");
        }

        // Vérification que l'utilisateur n'existe pas
        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($login);
        if ($user) {
            throw new Exception("L'utilisateur existe déjà");
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->registerUser($pseudo, $login, $hash);

        Utils::redirect('showLogIn');
    }

    /**
     * Met à jour les informations personnelles de l'utilsateur
     */
    public function updateUser(): void
    {
        // Récupération des données du formulaire
        $pseudo = htmlspecialchars(Utils::request('pseudo'));
        $login = htmlspecialchars(Utils::request('login'));
        $password = htmlspecialchars(Utils::request('password'));
        $userId = Utils::request('userId');

        // Vérification que les données soient valides
        if (empty($pseudo) || empty($login) || empty($password)) {
            throw new Exception("Le pseudo, l'adresse mail et le mot de passe doivent être saisis.");
        }

        // Validation des données saisies
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse mail saisie n'est pas valide");
        }

        // Vérification que l'utilisateur existe
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);
        if (!$user) {
            throw new Exception("L'utilisateur n'existe pas.");
        }

        if ($login !== $user->getLogin()) {
            // Vérification qu'un utilisateur avec la même adresse mail n'existe pas
            $userManager = new UserManager();
            $user = $userManager->getUserByLogin($login);
            if ($user) {
                throw new Exception('Un utilisateur avec la même adresse mail existe déjà.');
            }
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $userManager->updateUser($userId, $pseudo, $login, $hash);

        Utils::redirect('showAccount&userId='.$userId);
    }
}
