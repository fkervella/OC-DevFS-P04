<?php

/**
 * \brief représente un livre : ses données et ses fonctionnalités.
 *
 * Entité Book, un Book est défini par les champs
 * id, picture, title, author, description, user_id, availability, add_date.
 */
class Book extends AbstractEntity
{
    private int $idUser;
    private string $picture = '';
    private string $title = '';
    private string $author = '';
    private string $description = '';
    private bool $availability = false;
    private ?DateTime $addDate = null;

    /**
     * Sette pour l'id de l'utilisateur.
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }
}
