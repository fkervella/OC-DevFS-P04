<?php

/**
 * \brief contient des méthodes statiques pouvant être appelées directement.
 *
 * Classe utilitaire : cette classe ne contient que des méthodes statiques qui peuvent être appelées
 * directement sans avoir besoin d'instancier un objet Utils.
 * Exemple : Utils::redirect('home');.
 */
class Utils
{
    /**
     * Cette méthode permet de récupérer une variable de la superglobale $_REQUEST.
     * Si cette variable n'est pas définie, retour ne la valeur null (par défaut)
     * ou celle qui est passée en paramètre si elle existe.
     *
     * @param string $variableName : le nom de la variable à récupérer
     * @param mixes  $defaultValue : la valeur par défaut retournée si la variable n'est pas définie
     *
     * @return mixed : la valeur de la variable ou la valeur par défaut
     */
    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }
}
