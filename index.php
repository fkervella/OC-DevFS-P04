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
            Router::showBookDetail();

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
            Router::showAccount();

            break;

        case 'showChat':
            Router::showChat();

            break;

        case 'connectUser':
            Router::connectUser();

            break;

        case 'updateUser':
            Router::updateUser();

            break;

        case 'showAddBook':
            Router::showAddBook();

            break;

        case 'registerBook':
            Router::registerBook();

            break;

        case 'showUpdateBook':
            Router::showUpdateBook();

            break;

        case 'deleteBook':
            Router::deleteBook();

            break;

        case 'updateBook':
            Router::updateBook();

            break;

        default:
            throw new Exception("La page demandée {$action} n'existe pas.");

            break;
    }
} catch (Exception $error) {
    Router::showErrorPage('Index : '.$error->getMessage());
}
