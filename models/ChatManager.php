<?php

/**
 * \brief Contient la logique métier de ChatManager
 * gère les requêtes liées aux conversations.
 */
class ChatManager extends AbstractEntityManager
{
    /**
     * \brief Renvoie les conversations d'un utilisateur par son identifiant.
     *
     * @param mixed $userId
     *
     * @return array : conversations de l'utilisateur
     */
    public function getChatByUserId($userId): ?array
    {
        /**
         * 1. Récupération des conversations de l'utilisateur
         * 2. Pour chaque conversation, récupération des données du dernier message
         * 3. Pour chaque conversation, récupération des données de l'autre utilisateur de la conversation.
         */

        // 1.
        $sql = 'SELECT * FROM chat WHERE user_id_1=:userId OR user_id_2=:userId';
        $result = $this->db->query($sql, [
            'userId' => $userId,
        ]);

        $chats = [];

        while ($chatDb = $result->fetch()) {
            // 2.
            $chat = new Chat($chatDb);
            if ($this->getChatMessageNumber($chat->getId()) > 0) {
                $message = $this->getLastChatMessage($chat->getId());
                $chat->setLastMessage($message->getMessage());
                $chat->setLastMessageRead($message->getViewed());
                $chat->setLastMessageDate($message->getDatetime());
            }

            // 3.
            $otherUserId = $this->findOtherUserId($userId, $chat);

            $userManager = new UserManager();
            $otherUser = $userManager->getUserById($otherUserId);

            $chat->setOtherUserPseudo($otherUser->getPseudo());
            $chat->setOtherUserAvatar($otherUser->getAvatar());
            $chats[] = $chat;
        }

        return $chats;
    }

    /**
     * \brief créé une nouvelle conversation entre 2 utilisateurs.
     *
     * @param mixed $user1 premier utilisateur de la conversation
     * @param mixed $user2 deuxième utilisateur de la conversation
     *
     * @return bool renvoie true si la création a réussi, sinon false
     */
    public function createChat($user1, $user2): bool
    {
        $sql = 'INSERT INTO chat (user_id_1, user_id_2) VALUES (:userId1, :userId2)';
        $result = $this->db->query($sql, [
            'userId1' => $user1,
            'userId2' => $user2,
        ]);

        return $result->rowCount() > 0;
    }

    /**
     * \brief Vérifie si une conversation existe entre 2 utilisateurs.
     *
     * @param mixed $user1 premier utilisateur de la conversation
     * @param mixed $user2 deuxième utilisateur de la conversation
     *
     * @return bool renvoie true si la conversation existe, sinon false
     */
    public function existsChat($user1, $user2): bool
    {
        $sql = 'SELECT COUNT(*) FROM chat WHERE (user_id_1=:user1 AND user_id_2=:user2) OR (user_id_1=:user2 AND user_id_2=:user1)';
        $result = $this->db->query($sql, [
            'user1' => $user1,
            'user2' => $user2,
        ]);

        return 1 === $result->fetchColumn();
    }

    /**
     * \brief Récupère le nombre de messages dans une conversation.
     *
     * @param mixed $chatId identifiant de la conversation
     *
     * @return int nombre de messages dans la conversation
     */
    public function getChatMessageNumber($chatId): int
    {
        $sql = 'SELECT COUNT(*) FROM message WHERE chat_id=:chatId';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
        ]);

        return $result->fetchColumn();
    }

    /**
     * \brief Récupération des données de la conversation à partir de son identifiant de conversation et de l'identifiant de l'utilisateur.
     *
     * @param mixed $chatId identifiant de la conversation
     * @param mixed $userId identifiant de l'utilisateur
     *
     * @return null|Chat données de la conversation
     */
    public function getChatById($chatId, $userId): ?Chat
    {
        /**
         * 1. Récupération des données de la conversation
         * 2. Récupération des données de l'autre utilisateur de la conversation.
         */

        // 1.
        $sql = 'SELECT * FROM chat WHERE id=:chatId';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
        ]);

        $chatDb = $result->fetch();
        if ($chatDb) {
            // 2.
            $chat = new Chat($chatDb);
            $otherUserId = $this->findOtherUserId($userId, $chat);

            $userManager = new UserManager();
            $otherUser = $userManager->getUserById($otherUserId);

            $chat->setOtherUserPseudo($otherUser->getPseudo());
            $chat->setOtherUserAvatar($otherUser->getAvatar());

            return $chat;
        }

        return null;
    }

    /**
     * \brief Récupération des messafes d'une conversation.
     *
     * @param mixed $chatId identifiant de la conversation
     *
     * @return Message[] table des messages de la conversation
     */
    public function getChatMessages($chatId): array
    {
        $sql = 'SELECT * FROM message WHERE chat_id=:chatId';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
        ]);
        $messages = [];
        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }

        return $messages;
    }

    /**
     * \brief Ajoute un message à une conversation.
     *
     * @param mixed $chatId     identifiant de la conversation
     * @param mixed $userId     identifiant de l'utilisateur émetteur du message
     * @param mixed $newMessage test du message
     *
     * @return bool renvoie vrai si l'ajour du message a réussi, sinon false
     */
    public function addMessage($chatId, $userId, $newMessage): bool
    {
        $sql = 'INSERT INTO message (chat_id, sender_id, datetime, message, viewed) VALUES(:chatId, :senderId, NOW(), :message, 0)';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
            'senderId' => $userId,
            'message' => $newMessage,
        ]);

        return $result->rowCount() > 0;
    }

    /**
     * \brief Récupère le nombre de messages non vus par un utilisateur dans toute ses conversations.
     *
     * @param mixed $userId identifiant de l'utilisateur
     *
     * @return int nombre de messages non lus
     */
    public function getNotViewedMessagesNumber($userId): int
    {
        $sql = 'SELECT COUNT(*) FROM chat LEFT JOIN message ON chat.id=message.chat_id WHERE (chat.user_id_1=:userId OR chat.user_id_2=:userId) AND message.viewed=0 AND message.sender_id!=:userId';
        $result = $this->db->query($sql, [
            'userId' => $userId,
        ]);

        return $result->fetchColumn();
    }

    /**
     * \brief Enregistre l'état 'vu' des messages passés en paramètre.
     *
     * @param array $messages tableau des messages à passer à l'état 'vu'
     * @param mixed $userId   identifiant de l'utilisateur
     */
    public function setViewedMessages(array $messages, $userId): void
    {
        foreach ($messages as $message) {
            $sql = 'UPDATE message SET viewed=1 WHERE id=:messageId AND sender_id!=:userId';
            $result = $this->db->query($sql, [
                'messageId' => $message->getId(),
                'userId' => $userId,
            ]);
        }
    }

    /**
     * \brief Récupère le dernier message d'une conversation.
     *
     * @param mixed $chatId identifiant de la conversation
     *
     * @return null|Message données du message ou null si non trouvé
     */
    private function getLastChatMessage($chatId): ?Message
    {
        $sql = 'SELECT * FROM message WHERE chat_id=:chatId ORDER BY datetime DESC LIMIT 1';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
        ]);

        $message = $result->fetch();

        if ($message) {
            return new Message($message);
        }

        return null;
    }

    /**
     * \brief Trouve l'identifiant de l'autre utilisateur de la conversation.
     *
     * @param mixed $userId identifiant du premier utilisateur de la conversation
     * @param Chat  $chat   données de la conversation
     *
     * @return int|string identifiant de l'utilisateur ou null si non trouvé
     */
    private function findOtherUserId($userId, Chat $chat): int
    {
        /*
         * 1. Récupération des données de conversation
         * 2. Récupération des données de l'autre utilisateur de la conversation
         */
        // 1.
        if ($this->getChatMessageNumber($chat->getId()) > 0) {
            $message = $this->getLastChatMessage($chat->getId());
            $chat->setLastMessage($message->getMessage());
            $chat->setLastMessageRead($message->getViewed());
            $chat->setLastMessageDate($message->getDatetime());
        }

        // 2.
        if ($chat->getUserId1() === $userId) {
            $otherUserId = $chat->getUserId2();
        } else {
            $otherUserId = $chat->getUserId1();
        }

        return $otherUserId;
    }
}
