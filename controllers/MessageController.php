<?php

/**
 * \brief Contient la logique de l'entité Message.
 */
class MessageController
{
    /**
     * Affiche la page messagerie.
     */
    public function showChat(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Récupération des données des conversations de l'utilisateur
         * 3. Récupération des données de la conversation sélectionnée
         * 4. Récupération des messages de la conversation sélectionnée
         * 5. Envoi au messages reçus l'état 'vu'
         * 6. Affichage de la page Messagerie avec les données récupérées
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = intval(htmlspecialchars($_SESSION['userId']));
        $chatId = intval(htmlspecialchars(Utils::request('chatId')));
        /*$bookId = htmlspecialchars(Utils::request('bookId'));

        if(isset($bookId))
        {
           $bookManager = new BookManager();
           $book = $bookManager->getBookById($bookId);
           $sellerId = $book->getSellerId();
        }*/

        // 2.
        $chatManager = new ChatManager();
        $chats = $chatManager->getChatByUserId($userId);

        $messages = null;
        $currentChat = null;
        if (!empty($chatId)) {
            // 3.
            $currentChat = $chatManager->getChatById($chatId, $userId);

            // 4.
            if ($chatManager->getChatMessageNumber($chatId) > 0) {
                $messages = $chatManager->getChatMessages($chatId);
                // 5.
                $chatManager->setViewedMessages($messages, $userId);
            }
        }

        // 6.
        $view = new View('Messagerie');
        $view->render('chat', [
            'userId' => $userId,
            'chats' => $chats,
            'currentChat' => $currentChat,
            'messages' => $messages,
        ], 'chat.css', 'chat.js');
    }

    /**
     * Affiche la page de chat vers un utilisateur et initie la conversation avec cet utilisateur si elle n'existe pas.
     */
    public function showNewMessage(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Si une conversation entre l'utilisateur connecté et le vendeur n'existe pas, création de la conversation
         * 3. Récupération des données des conversations de l'utilisateur
         * 4. Récupération des données de la conversation sélectionnée
         * 5. Récupération des messages de la conversation sélectionnée
         * 6. Affichage de la page Messagerie avec les données récupérées
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = intval(htmlspecialchars($_SESSION['userId']));

        if (!empty(Utils::request('chatId') && !empty(Utils::request('bookId')))) {
            // Cas d'une nouvelle conversation demandée depuis la page d'un livre
            $chatId = intval(htmlspecialchars(Utils::request('chatId')));
            $bookId = intval(htmlspecialchars(Utils::request('bookId')));

            $bookManager = new BookManager();
            $book = $bookManager->getBookById($bookId);
            $sellerId = $book->getSellerId();
        } else {
            // Cas d'une nouvelle conversation demadnée depuis la page compte publique de l'utilisateur
            $sellerId = intval(htmlspecialchars(Utils::request('userId')));
        }

        // 2.
        $chatManager = new ChatManager();
        if (!$chatManager->existsChat($userId, $sellerId)) {
            $chatManager->createChat($userId, $sellerId);
        } else {
            $chatId = $chatManager->getChatIdByUserId($userId, $sellerId);
        }

        // 3.
        $chats = $chatManager->getChatByUserId($userId);

        $messages = null;
        $currentChat = null;
        if (!empty($chatId)) {
            // 4.
            $currentChat = $chatManager->getChatById($chatId, $userId);

            // 5.
            if ($chatManager->getChatMessageNumber($chatId) > 0) {
                $messages = $chatManager->getChatMessages($chatId);
            }
        }

        // 6.
        $view = new View('Messagerie');
        $view->render('chat', [
            'userId' => $userId,
            'chats' => $chats,
            'currentChat' => $currentChat,
            'messages' => $messages,
        ], 'chat.css', 'chat.js');
    }

    /**
     * Enregistre un nouveau message dans une conversation.
     */
    public function sendMessage(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Ajout d'un message dans la conversation
         * 3. Redirection vers la page messagerie
         */
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = intval(htmlspecialchars($_SESSION['userId']));
        $chatId = intval(htmlspecialchars(Utils::request('chatId')));
        $bookId = intval(htmlspecialchars(Utils::request('bookId')));
        $messageText = htmlspecialchars(Utils::request('newMessageText'));

        // 2.
        $chatManager = new ChatManager();
        $chatManager->addMessage($chatId, $userId, $messageText);

        // 3.
        Utils::redirect("showChat&bookId={$bookId}&chatId={$chatId}");
    }
}
