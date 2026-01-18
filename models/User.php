<?php

/**
 * \brief représete un utilisateur
 * Entité User : un User est défini par son id, un login, un password, un pseudo, une date d'inscription et un avatar.
 */
class User extends AbstractEntity
{
    private string $login;
    private string $password;
    private string $pseudo;
    private string $creationDate;
    private string $avatar;

    /**
     * Setter pour l'id.
     *
     * @param int $id identifiant de l'utilisateur
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter pour le userId.
     *
     * @return int identifiant de l'utilisateur
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Setter pour le login.
     *
     * @param string $login login de l'utilisateur
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * Getter pour le login.
     *
     * @return string login de l'utilisateur
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Setter pour le password.
     *
     * @param string $password mot de passe de l'utilisateur
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Getter pour le password.
     *
     * @return string mot de passe de l'utilisateur
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter pour le pseudo.
     *
     * @param string $pseudo pseudo de l'utilisateur
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Getter pour le pseudo.
     *
     * @return string pseudo de l'utilisateur
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Setter pour le creationDate.
     *
     * @param string $creationDate date d'enregistrement de l'utilisateur
     */
    public function setCreationDate(string $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * Getter pour le creationDate.
     *
     * @return string date d'enregistrement de l'utilisateur
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * Setter pour l'avatar.
     *
     * @param string $avatar chemin vers l'avatar de l'utilisateur
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * Getter pour l'avatar.
     *
     * @return string chemin vers l'avatar de l'utilisateur
     */
    public function getAvatar(): string
    {
        if (empty($this->avatar) || is_null($this->avatar)) {
            return './img/users/default.png';
        }

        return $this->avatar;
    }
}
