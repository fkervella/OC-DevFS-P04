<?php

require_once 'views/view.php';

/**
 * \brief Remplit le role de routeur dans l'applciation.
 */
class Router
{
    private static $routes = [
        'showHome' => [BookController::class],
        'showBookExchange' => [BookController::class],
        'showBookDetail' => [BookController::class],
        'showAddBook' => [BookController::class],
        'registerBook' => [BookController::class],
        'showUpdateBook' => [BookController::class],
        'deleteBook' => [BookController::class],
        'updateBook' => [BookController::class],
        'showSignIn' => [UserController::class],
        'showLogIn' => [UserController::class],
        'showLogOut' => [UserController::class],
        'registerUser' => [UserController::class],
        'updateUser' => [UserController::class],
        'showAccount' => [UserController::class],
        'connectUser' => [UserController::class],
        'showChat' => [MessageController::class],
        'showNewMessage' => [MessageController::class],
        'sendMessage' => [MessageController::class],
        'uploadAvatar' => [UserController::class],
        'uploadBookPicture' => [BookController::class],
    ];

    /**
     * \brief Fonction principale du routeur : appelle la page concernée en fonction des paramètres.
     *
     * @param $action    action demandée
     * @param $arguments arguments associés à cette action
     */
    public static function __callStatic($action, $arguments)
    {
        try {
            $controller = new self::$routes[$action][0]();

            return $controller->{$action}();
        } catch (Exception $error) {
            // En cas d'erreur, affichage de la page d'erreur
            $errorView = new View('Erreur');
            $errorView->render('errorPage', ['errorMessage' => 'Router : '.$error->getMessage()]);
        }
    }
}
