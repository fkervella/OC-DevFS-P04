<?php

/**
 * Classe qui gère les livres.
 */
class BookManager extends AbstractEntityManager
{
    /**
     * Récupère les derniers livres ajoutés.
     *
     * @param mixed $limit
     *
     * @return array: tableau d'objets Book
     */
    public function getLastAddedBooks($limit): array
    {
        $sql = "SELECT * FROM book ORDER BY add_date DESC LIMIT {$limit}";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books = new Book($book);
        }

        return $books;
    }
}
