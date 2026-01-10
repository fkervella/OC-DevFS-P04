<?php

/**
 * \brief Contient la logique métie de User Manager
 * UserManager gère les requêtes liées aux users et à l'authentification.
 */
class UserManager extends AbstractEntityManager
{
    /**
     * \brief Récupère un user par son login.
     *
     * @return User demandé ou null si non trouvé
     */
    public function getUserByLogin(string $login): ?User
    {
        $sql = 'SELECT * FROM user WHERE login=:login';
        $result = $this->db->query($sql, ['login' => $login]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    /**
     * \brief Récupère un User par son id.
     *
     * @return User demandé ou null si non trouvé
     */
    public function getUserById(int|string $userId): ?User
    {
        $sql = 'SELECT * FROM user WHERE id=:userId';
        $result = $this->db->query($sql, ['userId' => $userId]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }

        return null;
    }

    /**
     * \brief Enregistre l'utilisateur dans la base de données.
     *
     * @param $pseudo pseudo de l'utilisateur
     * @param $login  adresse mail de l'utilisateur
     * @param $hash   mot de passe hashé de l'utilisateur
     *
     * @return true si l'ajout a réussi, sinon false
     */
    public function registerUser($pseudo, $login, $hash): bool
    {
        $sql = 'INSERT INTO user (pseudo, login, password, creation_date, avatar) VALUES (:pseudo, :login, :password, NOW(), :avatar)';
        $result = $this->db->query($sql, [
            'pseudo' => $pseudo,
            'login' => $login,
            'password' => $hash,
            'avatar' => 'img/user.png',
        ]);

        return $result->rowCount() > 0;
    }

    /**
     * \brief Met à jour les informations personnelles d'un utilisateur dans la base de données.
     *
     * @param $userId identifiant de l'utilisateur à mettre à jour
     * @param $pseudo nouveau pseudo de l'utilisateur
     * @param $login  nouvelle adresse mail de l'utilisateur
     * @param $hash   nouveau mot de passe hashé de l'utilisateur
     *
     * @return true si la mise à jour a réussi, sinon false
     */
    public function updateUser($userId, $pseudo, $login, $hash): bool
    {
        $sql = 'UPDATE user SET pseudo=:pseudo, login=:login, password=:password WHERE id=:userId';
        $result = $this->db->query($sql, [
            'pseudo' => $pseudo,
            'login' => $login,
            'password' => $hash,
            'userId' => $userId,
        ]);

        return $result->rowCount() > 0;
    }

    /*
     * \brief Vérifie si l'utilisateur est connecté
     * @return état de connexion de l'utilisateur (1 : connecté / 0 : non connecté)
     */
    private function checkIfUserIsConnected(): bool
    {
        return isset($_SESSION['user']);
    }
}
