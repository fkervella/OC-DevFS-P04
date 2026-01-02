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

        default:
            throw new Exception("La page demandée {$action} n'existe pas.");

            break;
    }
} catch (Exception $error) {
    Router::showErrorPage($error->getMessage());
}
