<?php

/**
 * \brief gère les livres avec ajout, changement d'état, renvoi des livres.
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
    public function getLastAddedBooks($limit): ?array
    {
        $sql = "SELECT * FROM book ORDER BY add_date DESC LIMIT {$limit}";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    /**
     * Récupère les livres disponibles pour échange selon les mots clés indiqués.
     *
     * @param mixed $limit    : nombre maximum de livres renvoyés
     * @param array $keyWords : mots clés recherchés
     *
     * @return array : tableau d'objets Book
     */
    public function getSearchedBooks(?int $limit = 1, ?array $keyWords = []): ?array
    {
        $sql = "SELECT * FROM book LIMIT {$limit}";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }

    /**
     * Renvoie les données du livre passé en paramètre.
     *
     * @param $bookId : identifiant du livre dont les données sont à renvoyée
     *
     * @return Book : données du livre demandé
     */
    public function getBookDetail(int $bookId): ?Book
    {
        $sql = "SELECT * FROM book WHERE id={$bookId}";
        $result = $this->db->query($sql);

        $bookData = $result->fetch();
        if ($bookData) {
            return new Book($bookData);
        }

        return null;
    }
}
