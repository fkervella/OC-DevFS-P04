<?php

require_once 'views/view.php';

/**
 * \brief Remplit le role de routeur dans l'applciation.
 */
class Router
{
    /**
     * \brief Fonction principale du routeur : appelle la page concernée en fonction des paramètres.
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
                    $bookController = new BookController();
                    $bookController->showBookDetail();

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

                case 'registerUser':
                    $userController = new UserController();
                    $userController->registerUser();

                    break;

                case 'updateUser':
                    $userController = new UserController();
                    $userController->updateUser();

                    break;

                case 'showAccount':
                    $userController = new UserController();
                    $userController->showAccount();

                    break;

                case 'showChat':
                    $messageController = new MessageController();
                    $messageController->showChat();

                    break;

                case 'connectUser':
                    $userController = new UserController();
                    $userController->connectUser();

                    break;

                case 'showAddBook':
                    $bookController = new BookController();
                    $bookController->showAddBook();

                    break;

                case 'registerBook':
                    $bookController = new BookController();
                    $bookController->registerBook();

                    break;

                case 'showUpdateBook':
                    $bookController = new BookController();
                    $bookController->showUpdateBook();

                    break;

                case 'deleteBook':
                    $bookController = new BookController();
                    $bookController->deleteBook();

                    break;

                case 'updateBook':
                    $bookController = new BookController();
                    $bookController->updateBook();

                    break;

                case 'showNewMessage':
                    $messageController = new MessageController();
                    $messageController->showNewMessage();

                    break;

                case 'sendMessage':
                    $messageController = new MessageController();
                    $messageController->sendMessage();

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
