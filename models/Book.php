<?php

/**
 * Entité Book, un Book est défini par les champs
 * id, picture, title, author, description, user_id, availability, add_date.
 */
class Book extends AbstractEntity 
{
    private int $idUser;
    private string $picture = "";
    private string $title = "";
    private string $author = "";
    private string $description = "";
    private boolean $availability = false;
    private ?DateTime $addDate = null;

    /**
     * Sette pour l'id de l'utilisateur.
     * @param int $idUser.
     */
    public function setIdUser(int $idUser) : void
    {
        $this->idUser = $idUser;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     * @return int
     */
    public function getIdUser() : int
    {
        return $this->idUser;
    }
}
