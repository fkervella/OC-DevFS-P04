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
     * @param mixed  $defaultValue : la valeur par défaut retournée si la variable n'est pas définie
     *
     * @return mixed : la valeur de la variable ou la valeur par défaut
     */
    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    /**
     * Redirige vers une URL.
     *
     * @param string $action: action attendue (correspond aux actions dans le routeur)
     * @param array  $params  : facultatif, les paramètres de l'action sont sous la forme['param1' => 'valeur1', 'param2' => 'valeur2']
     */
    public static function redirect(string $action, array $params = []): void
    {
        $url = "index.php?action={$action}";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&{$paramName}={$paramValue}";
        }
        header("Location: {$url}");

        exit;
    }

    /**
     * Cette méthode protège une chaine de caractères contre les attaques XSS.
     * De plus, elle transforme les retours à la ligne en balises <p> pour un affichage plus agréable.
     *
     * @param string $string : la chaine à protéger
     *
     * @return string : la chaine protégée
     */
    public static function format(string $string): string
    {
        // Etape 1 : protection du texte avec htmlspecialchard
        $finalString = htmlspecialchars($string, ENT_QUOTES);

        // Etape 2 : texte découpé par rapport aux retours à la ligne
        $lines = explode("\n", $finalString);

        // Etape 3 : Recontruction en mettant chaque ligne dans un paragraphe (et en sautant les lignes vides)
        $finalString = '';
        foreach ($lines as $line) {
            if ('' != trim($line)) {
                $finalString .= "<p>{$line}</p>";
            }
        }

        return $finalString;
    }

    /**
     * Cette méthode vérifie si le nombre est pair.
     *
     * @param $number nombre à évaluer
     *
     * @return true si le nombre est pair, sinon false
     */
    public static function isEven(int $number): bool
    {
        if (0 == $number % 2) {
            return true;
        }

        return false;
    }

    /**
     * Cette méthode extrait les heures minutes et secondes d'une date.
     *
     * @param string $inputDate date au format chaine de carectère
     */
    public static function getDateHourMinute(string $inputDate): ?string
    {
        try {
            preg_match('/\d{4}-\d{2}-\d{2}\s(\d{2}):(\d{2}):(\d{2})/', $inputDate, $matches);

            if (4 === count($matches)) {
                return $matches[1].':'.$matches[2];
            }

            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Cette méthode extrait les heures minutes et secondes d'une date.
     *
     * @param string $inputDate date au format chaine de carectère
     */
    public static function getDateDayMonthYearHourMinute(string $inputDate): ?string
    {
        try {
            preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $inputDate, $matches);

            if (7 === count($matches)) {
                return $matches[3].'-'.$matches[2].'-'.$matches[1].' '.$matches[4].':'.$matches[5];
            }

            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * retourne le code js à intégrer en attribut d'un bouton.
     * pour ouvrir une popup "confirm" et n'effectuer l'action que si l'utilisateur a bien cliqué sur "ok".
     *
     * @param string $message message à afficher dans la popup
     *
     * @return string code js dans le bouton
     */
    public static function askConfirmation(string $message): string
    {
        return "onClick=\"return confirm('{$message}');\"";
    }
}
