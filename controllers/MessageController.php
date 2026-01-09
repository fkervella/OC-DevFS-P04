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
        $view = new View('Messagerie');
        $view->render('chat', [], 'chat.css');
    }
}
