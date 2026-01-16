<?php

require_once 'config/config.php';

require_once 'config/autoload.php';

require_once 'bootstrap/router.php';

$action = Utils::request('action', 'showHome');

try {
    Router::$action();
} catch (Exception $error) {
    Router::showErrorPage('Index : '.$error->getMessage());
}
 