<?php

/**
 * Entité User : un User est défini par son id, un login, un password, un pseudo, une date d'inscription et un avatar.
 */
class User extends AbstractEntity
{
    private string $login;
    private string $password;
    private string $pseudo;
    private string $registrationDate;
    private string $avatar;

    /**
     * Setter pour l'id.
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter pour le userId.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Setter pour le login.
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * Getter pour le login.
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Setter pour le password.
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Getter pour le password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Setter pour le pseudo.
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * Getter pour le pseudo.
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Setter pour le registrationiDate.
     */
    public function setRegistrationDate(string $registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }

    /**
     * Getter pour le registrationDate.
     */
    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    /**
     * Setter pour l'avatar.
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * Getter pour l'avatar.
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
