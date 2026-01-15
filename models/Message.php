<?php

/**
 * \brief représente le message d'une conversation : ses données et ses fonctionnnalités.
 *
 * Entité Message, un Message est défini par les champs id, chatId, emetteur, dateHeure, le message et l'état de visualisation
 */
class Message extends AbstractEntity
{
    private int $chatId;
    private int $senderId;
    private string $messageDatetime;
    private string $message;
    private int $viewed;

    /**
     * Setter pour l'id du message.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter de l'id du message.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Setter pour l'identifiant de la conversation du message.
     */
    public function setChatId(int $chatId): void
    {
        $this->chatId = $chatId;
    }

    /**
     * Getter de l'identifiant de la conversation du message.
     */
    public function getChatId(): int
    {
        return $this->chatId;
    }

    /**
     * Setter pour l'identifiatn de l'émetteur du message.
     */
    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    /**
     * Getter de l'identifiant de l'émetteur du message.
     */
    public function getSenderId(): int
    {
        return $this->senderId;
    }

    /**
     * Setter pour l'horodatage du message.
     */
    public function setDatetime(string $messageDatetime): void
    {
        $this->messageDatetime = $messageDatetime;
    }

    /**
     * Getter de l'horodatage du message.
     */
    public function getDatetime(): string
    {
        return $this->messageDatetime;
    }

    /**
     * Setter pour le texte du message.
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Getter de le texte du message.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Setter pour l'état de visualisation du message.
     */
    public function setViewed(int $viewed): void
    {
        $this->viewed = $viewed;
    }

    /**
     * Getter de l'état de visualisation du message.
     */
    public function getViewed(): int
    {
        return $this->viewed;
    }
}
