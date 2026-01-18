<?php

/**
 * \brief Génère les vues en fonction de ce que chaque controller lui passe en paramètre.
 */
class View
{
    /**
     * Le titre de la page.
     */
    private string $title;

    /**
     * Constructuer.
     *
     * @param mixed $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Cette méthode retourne une page complète.
     *
     * @param string $viewName : nom de la vue demandée par le controller
     * @param array  $params   : paramètres que le controller a envoyé à la vue
     * @param string $style    : style complémentaire à utiliser dans la vue
     * @param string $script   : script à ajouter à la vue
     */
    public function render(string $viewName, array $params = [], ?string $style = '', ?string $script = ''): void
    {
        // vue envoyée
        $viewPath = $this->buildViewPath($viewName);

        // Les deux variaables ci-dessous sont utilisées dans le main.php qui est le template principal
        $content = $this->_renderViewFromTemplate($viewPath, $params);
        $title = $this->title;
        $view = $viewName;
        $additionalStyle = $style;
        $viewScript = $script;
        $userConnected = isset($_SESSION['user']);

        $notViewedMessagesNumber = null;
        if ($userConnected) {
            $chatManager = new ChatManager();
            $notViewedMessagesNumber = $chatManager->getNotViewedMessagesNumber($_SESSION['userId']);
        }
        ob_start();

        require MAIN_VIEW_PATH;
        echo ob_get_clean();
    }

    /**
     * Coeur de la classe, c'est ici qu'est généré ce que le controller a demandé.
     *
     * @param       $viewPath : chemin de la vue demandée par le controller
     * @param array $params   paramètres que le controller a envoyés à la vue
     *
     * @return string : le contenu de la vue
     *
     * @throws Exception : si la vue n'existe pas
     */
    private function _renderViewFromTemplate(string $viewPath, array $params = []): string
    {
        if (file_exists($viewPath)) {
            extract($params); // transformation des variables stockées dans le tableau "params" en véritables variables qui pourront être lues dans le template.

            ob_start();

            require $viewPath;

            return ob_get_clean();
        }

        throw new Exception("La vue '{$viewPath}' est introuvable.");
    }

    /**
     * Construit le chemin vers la vue demandée.
     *
     * @param string $viewName : nom de la vue demandée
     *
     * @return string : chemin vers la vue demandée
     */
    private function buildViewPath(string $viewName): string
    {
        return TEMPLATE_VIEW_PATH.$viewName.'.php';
    }
}
