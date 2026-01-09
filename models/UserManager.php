<?php

/**
 * UserManager gère les requêtes liées aux users et à l'authentification.
 */
class UserManager extends AbstractEntityManager
{
    /**
     * \brief Récupère un user par son login.
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

    /*
     * \brief Vérifie si l'utilisateur est connecté
     * @return état de connexion de l'utilisateur (1 : connecté / 0 : non connecté)
     */
    private function checkIfUserIsConnected(): bool
    {
        return isset($_SESSION['user']);
    }
}
