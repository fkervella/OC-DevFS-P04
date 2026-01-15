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
    private int $availability = 0;
    private ?string $addDate = null;
    private string $sellerPseudo = '';
    private ?int $sellerId = null;

    /**
     * Setter pour l'id de l'utilisateur.
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

    /**
     * Setter pour l'id de l'utilisateur.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Setter pour le titre du livre.
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre du livre.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Setter pour le nom de l'auteur du livre.
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * Getter pour le nom de l'auteur du livre.
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Setter pour l'image du livre.
     */
    public function setPicture(?string $picture): void
    {
        if (is_null($picture)) {
            $this->picture = '';
        } else {
            $this->picture = $picture;
        }
    }

    /**
     * Getter pour l'image du livre.
     */
    public function getPicture(): ?string
    {
        if ('' !== $this->picture) {
            return $this->picture;
        }

        return null;
    }

    /**
     * Setter pour la description du livre.
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Getter pour la description du livre.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Setter pour la disponibilité du livre.
     */
    public function setAvailability(int $availability): void
    {
        $this->availability = $availability;
    }

    /**
     * Getter pour la disponibilité du livre.
     */
    public function getAvailability(): int
    {
        return $this->availability;
    }

    /**
     * Setter pour la date d'ajout du livre.
     */
    public function setAddDate(string $date): void
    {
        $this->addDate = $date;
    }

    /**
     * Getter pour la date d'ajout du livre.
     */
    public function getAddDate(): string
    {
        return $this->addDate;
    }

    /**
     * Setter pour le pseudo du vendeur du livre.
     */
    public function setSellerPseudo(?string $pseudo): void
    {
        if (is_null($pseudo)) {
            $this->sellerPseudo = '';
        } else {
            $this->sellerPseudo = $pseudo;
        }
    }

    /**
     * Getter pour le pseudo du vendeur du livre.
     */
    public function getSellerPseudo(): string
    {
        return $this->sellerPseudo;
    }

    /**
     * Setter pour l'identifiant du vendeur du livre.
     */
    public function setSellerId(?int $sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    /**
     * Getter pour l'identifiant du vendeur du livre.
     */
    public function getSellerId(): int
    {
        return $this->sellerId;
    }
}
