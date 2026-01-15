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

    // Déconnecte l'utilisateur courant.
    public function logOut(): void
    {
        unset($_SESSION['user'], $_SESSION['userId']);

        Utils::redirect('showHome');
    }

    /**
     * Affiche la page du compte utilisateur.
     */
    public function showAccount(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Récupération des données de l'utilisateur
         * 3. Calcul pour déterminer depuis quand l'utilisateur est enregistré
         * 4. Récupération des livres de l'utilisateur
         * 5. Affichage de la page Mon compte
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = $_SESSION['userId'];

        // 2.
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);

        $pseudo = htmlspecialchars($user->getPseudo());
        $login = htmlspecialchars($user->getLogin());
        $avatar = htmlspecialchars($user->getAvatar());

        // 3.
        $creationDate = new DateTime($user->getCreationDate());
        $nowDate = new DateTime();

        $interval = $creationDate->diff($nowDate);
        $ecart = $interval->format('%a jours');

        // 4.
        $bookManager = new BookManager();
        $bookNumber = $bookManager->getUserBookNumber($userId);
        $books = $bookManager->getUserBooks($userId);

        // 5.
        $view = new View('Mon compte');
        $view->render('account', [
            'pseudo' => $pseudo,
            'login' => $login,
            'avatar' => $avatar,
            'userId' => $userId,
            'ecart' => $ecart,
            'books' => $books,
            'bookNumber' => $bookNumber,
        ], 'account.css');
    }

    /**
     * Connexion de l'utilisateur.
     */
    public function connectUser(): void
    {
        /**
         * 1. Filtrage de données d'entrée
         * 2. Vérification que l'utilisateur existe
         * 3. Vérification que le mot de passe soit correct
         * 4. Connexion de l'utilisateur
         * 5. Redirection vers la page du compte utilisateur.
         */

        // 1.
        $login = Utils::request('login');
        $password = Utils::request('password');

        if (empty($login) || empty($password)) {
            throw new Exception("L'adresse email et le mot de passe doivent être saisis.");
        }

        // 2.
        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($login);
        if (!$user) {
            throw new Exception("L'utilisateur indiqué n'est pas enregistré");
        }

        // 3.
        if (!password_verify($password, $user->getPassword())) {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            throw new Exception("Le mot de passe est incorrect : {$hash}");
        }

        // 4.
        $_SESSION['user'] = $user;
        $_SESSION['userId'] = $user->getId();

        // 5.
        Utils::redirect('showAccount');
    }

    /**
     * Enregistre un nouvel utilisateur.
     */
    public function registerUser(): void
    {
        /**
         * 1. Filtrage des données d'entrée
         * 2. Validation des données saisies
         * 3. Vérification que l'utilisateur n'existe pas
         * 4. Hashage du mot de pasae
         * 5. Enregistrement des données de l'utilisateur en base
         * 6. Redirection vers la page de connexion.
         */

        // 1.
        $pseudo = htmlspecialchars(Utils::request('pseudo'));
        $login = htmlspecialchars(Utils::request('login'));
        $password = htmlspecialchars(Utils::request('password'));

        if (empty($pseudo) || empty($login) || empty($password)) {
            throw new Exception("Le pseudo, l'adresse mail et le mot de passe doivent être saisis.");
        }

        // 2.
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse mail saisie n'est pas valide");
        }

        // 3.
        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($login);
        if ($user) {
            throw new Exception("L'utilisateur existe déjà");
        }

        // 4.
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // 5.
        $userManager->registerUser($pseudo, $login, $hash);

        // 6.
        Utils::redirect('showLogIn');
    }

    /**
     * Met à jour les informations personnelles de l'utilsateur.
     */
    public function updateUser(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Validation des données saisies
         * 3. Vérification que l'utilisateur existe
         * 4. Vérification qu'un utilisateur avec la même adresse mail n'existe pas
         * 5. Hashage du mot de passe
         * 6. Enregistrement des informations utilisateur en base
         * 7. Redirection vers la page Mon compte
         */
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = $_SESSION['userId'];

        $pseudo = htmlspecialchars(Utils::request('pseudo'));
        $login = htmlspecialchars(Utils::request('login'));
        $password = htmlspecialchars(Utils::request('password'));

        if (empty($pseudo) || empty($login) || empty($password)) {
            throw new Exception("Le pseudo, l'adresse mail et le mot de passe doivent être saisis.");
        }

        // 2.
        if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("L'adresse mail saisie n'est pas valide");
        }

        // 3.
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);
        if (!$user) {
            throw new Exception("L'utilisateur n'existe pas.");
        }

        if ($login !== $user->getLogin()) {
            // 4.
            $userManager = new UserManager();
            $user = $userManager->getUserByLogin($login);
            if ($user) {
                throw new Exception('Un utilisateur avec la même adresse mail existe déjà.');
            }
        }

        // 5.
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // 6.
        $userManager->updateUser($userId, $pseudo, $login, $hash);

        // 7.
        Utils::redirect('showAccount');
    }
}
