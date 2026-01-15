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
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = $_SESSION['userId'];
        $chatId = htmlspecialchars(Utils::request('chatId'));
        $bookId = htmlspecialchars(Utils::request('bookId'));

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        $sellerId = $book->getSellerId();

        $chatManager = new ChatManager();

        $chats = $chatManager->getChatByUserId($userId);

        $messages = null;
        if (is_null($chatId)) {
            $currentChat = null;
        } else {
            $currentChat = $chatManager->getChatById($chatId, $userId);

            if ($chatManager->getChatMessageNumber($chatId) >0 ) {
                $messages = $chatManager->getChatMessages($chatId);
            }
        }

        $view = new View('Messagerie');
        $view->render('chat', [
            'userId' => $userId,
            'bookId' => $bookId,
            'chats' => $chats,
            'currentChat' => $currentChat,
            'messages' => $messages,
        ], 'chat.css');
    }

    /**
     * Affiche la page de chat vers un utilisateur et initie la conversation avec cet utilisateur si elle n'existe pas.
     */
    public function showNewMessage()
    {
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = $_SESSION['userId'];
        $chatId = htmlspecialchars(Utils::request('chatId'));
        $bookId = htmlspecialchars(Utils::request('bookId'));

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);
        $sellerId = $book->getSellerId();

        $chatManager = new ChatManager();

        if (!$chatManager->existsChat($userId, $sellerId)) {
            $chatManager->createChat($userId, $sellerId);
        }

        $chats = $chatManager->getChatByUserId($userId);

        $messages = null;
        if (is_null($chatId)) {
            $currentChat = null;
        } else {
            $currentChat = $chatManager->getChatById($chatId, $userId);

            if ($chatManager->getChatMessageNumber($chatId) > 0) {
                $messages = $chatManager->getChatMessages($chatId);
            }
        }

        $view = new View('Messagerie');
        $view->render('chat', [
            'userId' => $userId,
            'bookId' => $bookId,
            'chats' => $chats,
            'currentChat' => $currentChat,
            'messages' => $messages,
        ], 'chat.css');
    }

    public function sendMessage(): void
    {
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = $_SESSION['userId'];
        $chatId = htmlspecialchars(Utils::request('chatId'));
        $bookId = htmlspecialchars(Utils::request('bookId'));
        $messageText = htmlspecialchars(Utils::request('newMessageText'));

        $chatManager = new ChatManager();
        $chatManager->addMessage($chatId, $userId, $messageText);

        Utils::redirect("showChat&bookId={$bookId}&chatId={$chatId}");
    }
}
