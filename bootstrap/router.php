<?php

require_once 'views/view.php';

/**
 * \brief Remplit le role de routeur dans l'applciation.
 */
class Router
{
    /**
     * Fonction principale du routeur : appelle la page concernée en fonction des paramètres.
     *
     * @param $action    action demandée
     * @param $arguments arguments associés à cette action
     */
    public static function __callStatic($action, $arguments)
    {
        try {
            switch ($action) {
                case 'showHome':
                    $bookController = new BookController();
                    $bookController->showHome();

                    break;

                case 'showErrorPage':
                    $errorView = new View('Erreur');
                    $errorView->render('errorPage', ['errorMessage' => $arguments[0]]);

                    break;

                case 'showBookExchange':
                    $bookController = new BookController();
                    $bookController->showBookExchange();

                    break;

                case 'showBookDetail' :
                    $bookId = $arguments[0];

                    $bookController = new BookController();
                    $bookController->showBookDetail($bookId);

                    break;

                case 'showSignIn':
                    $userController = new UserController();
                    $userController->showSignIn();

                    break;

                case 'showLogIn':
                    $userController = new UserController();
                    $userController->showLogIn();

                    break;

                case 'showLogOut':
                    $userController = new UserController();
                    $userController->logOut();

                    break;

                case 'showAccount':
                    $userId = $arguments[0];

                    $userController = new UserController();
                    $userController->showAccount($userId);

                    break;

                case 'showChat':
                    $userId = $arguments[0];

                    $messageController = new MessageController();
                    $messageController->showChat($userId);

                    break;

                default:
                    throw new Exception("Router : La page {$action} demandée n'existe pas.");
            }
        } catch (Exception $error) {
            // En cas d'erreur, affichage de la page d'erreur
            $errorView = new View('Erreur');
            $errorView->render('errorPage', ['errorMessage' => 'Router : '.$error->getMessage()]);
        }
    }
}
