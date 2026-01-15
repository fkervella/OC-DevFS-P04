<?php

/**
 * \breif Contient la logique métier de ChatManager
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
        $sql = 'SELECT * FROM chat WHERE user_id_1=:userId OR user_id_2=:userId';
        $result = $this->db->query($sql, [
            'userId' => $userId,
        ]);

        $chats = [];

        while ($chatDb = $result->fetch()) {
            $chat = new Chat($chatDb);
            if ($this->getChatMessageNumber($chat->getId()) > 0) {
                $message = $this->getLastChatMessage($chat->getId());
                $chat->setLastMessage($message->getMessage());
                $chat->setLastMessageRead($message->getViewed());
                $chat->setLastMessageDate($message->getDatetime());
            }

            $otherUserId = $this->findOtherUserId($userId, $chat);

            $userManager = new UserManager();
            $otherUser = $userManager->getUserById($otherUserId);

            $chat->setOtherUserPseudo($otherUser->getPseudo());
            $chat->setOtherUserAvatar($otherUser->getAvatar());
            $chats[] = $chat;
        }

        return $chats;
    }

    public function createChat($user1, $user2): bool
    {
        $sql = 'INSERT INTO chat (user_id_1, user_id_2) VALUES (:userId1, :userId2)';
        $result = $this->db->query($sql, [
            'userId1' => $user1,
            'userId2' => $user2,
        ]);

        return $result->rowCount() > 0;
    }

    public function existsChat($user1, $user2): bool
    {
        $sql = 'SELECT COUNT(*) FROM chat WHERE (user_id_1=:user1 AND user_id_2=:user2) OR (user_id_1=:user2 AND user_id_2=:user1)';
        $result = $this->db->query($sql, [
            'user1' => $user1,
            'user2' => $user2,
        ]);

        return 1 === $result->fetchColumn();
    }

    public function getChatMessageNumber($chatId): int
    {
        $sql = 'SELECT COUNT(*) FROM message WHERE chat_id=:chatId';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
        ]);

        return $result->fetchColumn();
    }

    public function getChatById($chatId, $userId): ?Chat
    {
        $sql = 'SELECT * FROM chat WHERE id=:chatId';
        $result = $this->db->query($sql, [
            'chatId' => $chatId,
        ]);

        $chatDb = $result->fetch();
        if ($chatDb) {
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

    private function findOtherUserId($userId, Chat $chat): int
    {
        if ($this->getChatMessageNumber($chat->getId()) > 0) {
            $message = $this->getLastChatMessage($chat->getId());
            $chat->setLastMessage($message->getMessage());
            $chat->setLastMessageRead($message->getViewed());
            $chat->setLastMessageDate($message->getDatetime());
        }

        if ($chat->getUserId1() === $userId) {
            $otherUserId = $chat->getUserId2();
        } else {
            $otherUserId = $chat->getUserId1();
        }

        return $otherUserId;
    }
}
