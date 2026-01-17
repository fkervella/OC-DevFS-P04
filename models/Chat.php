<?php

/**
 * \brief représente une conversation : ses données et ses fonctionnalités.
 *
 * Entité Chat, un Chat est défini par les champs
 * id, user_1, user_2.
 */
class Chat extends AbstractEntity
{
    private int $idUser1;
    private int $idUser2;
    private string $otherUserPseudo = '';
    private string $otherUserAvatar = '';
    private string $lastMessage = '';
    private string $lastMessageDate;
    private int $lastMessageRead = 0;

    /**
     * Setter pour l'id du chat.
     *
     * @param int $id identifiant de la conversation
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter pour l'id du chat.
     *
     * @return int identifiant de la conversation
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Setter pour l'id de l'utilisateur 1.
     *
     * @param int $idUser1 identifiant d'une des 2 personnes de la conversation
     */
    public function setUserId1(int $idUser1): void
    {
        $this->idUser1 = $idUser1;
    }

    /**
     * Getter pour l'id de l'utilisateur 1.
     *
     * @return int identifiant d'une des 2 personnes de la conversation
     */
    public function getUserId1(): int
    {
        return $this->idUser1;
    }

    /**
     * Setter pour l'id de l'utilisateur 2.
     *
     * @param int $idUser2 identifiant d'une des 2 personnes de la conversation
     */
    public function setUserId2(int $idUser2): void
    {
        $this->idUser2 = $idUser2;
    }

    /**
     * Getter pour l'identifiant de l'utilisateur 2.
     *
     * @return int identifiant d'une des 2 personnes de la conversation
     */
    public function getUserId2(): int
    {
        return $this->idUser2;
    }

    /**
     * Setter pour le pseudo de l'autre utilisateur du chat.
     *
     * @param string $otherUserPseudo pseudo de l'autre utilisateur de la conversation
     */
    public function setOtherUserPseudo(string $otherUserPseudo): void
    {
        $this->otherUserPseudo = $otherUserPseudo;
    }

    /**
     * Getter pour le pseudo de l'autre utilisateur du chat.
     *
     * @return string pseudo de l'autre utilisateur de la conversation
     */
    public function getOtherUserPseudo(): string
    {
        return $this->otherUserPseudo;
    }

    /**
     * Setter pour l'avatar de l'autre utilisateur du chat.
     *
     * @param string $otherUserAvatar chemin vers l'avatar de l'autre utilisateu de la conversation
     */
    public function setOtherUserAvatar(string $otherUserAvatar): void
    {
        $this->otherUserAvatar = $otherUserAvatar;
    }

    /**
     * Getter pour l'avatar de l'autre utilisateur du chat.
     *
     * @return string chemin vers l'avatar de l'autre utilisateur de la conversation
     */
    public function getOtherUserAvatar(): string
    {
        return $this->otherUserAvatar;
    }

    /**
     * Setter pour le dernier message du chat.
     *
     * @param string $lastMessage dernier message de la conversation
     */
    public function setLastMessage(string $lastMessage): void
    {
        $this->lastMessage = $lastMessage;
    }

    /**
     * Getter pour le dernier message du chat.
     *
     * @return string dernier message de la conversation
     */
    public function getLastMessage(): ?string
    {
        if (isset($this->lastMessage)) {
            return $this->lastMessage;
        }

        return null;
    }

    /**
     * Setter pour la date du dernier message du chat.
     *
     * @param string $lastMessageDate horodatage du dernier message de la conversation
     */
    public function setLastMessageDate(string $lastMessageDate): void
    {
        $this->lastMessageDate = $lastMessageDate;
    }

    /**
     * Getter pour la date du dernier message du chat.
     *
     * @return string horodatage du dernier message de la conversation
     */
    public function getLastMessageDate(): ?string
    {
        if (isset($this->lastMessageDate)) {
            return $this->lastMessageDate;
        }

        return null;
    }

    /**
     * Setter pour l'état lu dernier message du chat.
     *
     * @param int $lastMessageRead état lu du dernier message de la conversation
     */
    public function setLastMessageRead(int $lastMessageRead): void
    {
        $this->lastMessageRead = $lastMessageRead;
    }

    /**
     * Getter pour l''état lu du dernier message du chat.
     *
     * @return int état lu du dernier message de la conversation
     */
    public function getLastMessageRead(): ?int
    {
        if (isset($this->lastMessageRead)) {
            return $this->lastMessageRead;
        }

        return null;
    }
}
