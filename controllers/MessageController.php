<?php

/**
 * \brief Contient la logique de l'entité Message.
 */
class MessageController
{
    /**
     * Affiche la page messagerie.
     */
    public function showChat(int $userId): void
    {
        $view = new View('chat');
        $view->render('chat', [], 'chat.css');
    }
}
