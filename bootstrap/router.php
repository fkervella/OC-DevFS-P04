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
                default:
                    throw new Exception("La page demandée n'existe pas.");
            }
        } catch (Exception $error) {
            // En cas d'erreur, affichage de la page d'erreur
            $errorView = new View('Erreur');
            $errorView->render('errorPage', ['errorMessage' => $error->getMessage()]);
        }
    }
}
