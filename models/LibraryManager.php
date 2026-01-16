<?php

/**
 * \brief gère les biliothèques des utilisateurs.
 */
class LibraryManager extends AbstractEntityManager
{
    /**
     * Ajoute un livre à la bibliothèque d'un utilisateur.
     *
     * @param $userId identifiant de l'utilisatuer
     * @param $bookId identifiant du livre
     *
     * @return bool renvoie true si l'ajout a réussi, sinon false
     */
    public function addBook($userId, $bookId): bool
    {
        $sql = 'INSERT INTO library (user_id, book_id) VALUES(:userId, :bookId)';
        $result = $this->db->query($sql, [
            'userId' => $userId,
            'bookId' => $bookId,
        ]);

        return $result->rowCount() > 0;
    }
}
