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
                throw new Exception('Index : Le numéro du livre indiqué est invalide : -1');
            }

            break;

        default:
            throw new Exception("Index : La page demandée {$action} n'existe pas.");

            break;
    }
} catch (Exception $error) {
    Router::showErrorPage('Index : '.$error->getMessage());
}
