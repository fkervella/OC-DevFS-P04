<?php

require_once 'config/config.php';

require_once 'config/autoload.php';

require_once 'bootstrap/router.php';

$action = Utils::request('action', 'showHome');

try {
    switch ($action) {
        case 'showHome':
            Router::showHome();

            break;

        case 'showBookExchange':
            Router::showBookExchange();

            break;

        case 'showBookDetail':
            $bookId = Utils::request('bookId', -1);
            if (-1 !== $bookId) {
                Router::showBookDetail($bookId);
            } else {
                throw new Exception('Le numéro du livre indiqué est invalide : -1');
            }

            break;

        case 'showSignIn':
            Router::showSignIn();

            break;

        case 'showLogIn':
            Router::showLogIn();

            break;

        case 'showLogOut':
            Router::showLogOut();

            break;

        case 'registerUser':
            Router::registerUser();

            break;

        case 'showAccount':
            $userId = Utils::request('userId', -1);
            if (-1 !== $userId) {
                Router::showAccount($userId);
            } else {
                throw new Exception("l'identifiant de l'utilisateur indiqué n'est pas valide : {$userId}");
            }

            break;

        case 'showChat':
            $userId = Utils::request('userId', 1);
            if (-1 !== $userId) {
                Router::showChat($userId);
            } else {
                throw new Exception("l'identifiant indiqué pour l'utilisateur n'est pas valide : {$userId}");
            }

            break;

        case 'connectUser':
            $userController = new UserController();
            $userController->connectUser();

            break;

        default:
            throw new Exception("La page demandée {$action} n'existe pas.");

            break;
    }
} catch (Exception $error) {
    Router::showErrorPage('Index : '.$error->getMessage());
}
