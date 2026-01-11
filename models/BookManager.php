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
        $sql = "SELECT book.id AS 'id', book.picture AS 'picture', book.title AS 'title', book.author AS 'author', book.description AS 'description', book.availability AS 'availability', book.add_date AS 'add_date', user.id as 'sellerId', user.pseudo as 'sellerPseudo' FROM book LEFT JOIN library ON book.id = library.book_id LEFT JOIN user ON library.user_id = user.id ORDER BY add_date DESC LIMIT {$limit}";
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
     * @param mixed $limit : nombre maximum de livres renvoyés
     *
     * @return array : tableau d'objets Book
     */
    public function getSearchedBooks(?int $limit = 1, ?array $keyWordsArray = []): ?array
    {
        $initial = 1;
        $search = '';
        foreach ($keyWordsArray as $keyWord) {
            if ('' !== $keyWord) {
                if (1 === $initial) {
                    $search = "WHERE title like %{$keyWord}% ";
                    $initial = 0;
                } else {
                    $search .= "AND title like %{$keyWord}% ";
                }
            }
        }

        if ('' === $search) {
            $sql = "SELECT book.id AS 'id', book.picture AS 'picture', book.title AS 'title', book.author AS 'author', book.description AS 'description', book.availability AS 'availability', book.add_date AS 'add_date', user.id as 'sellerId', user.pseudo as 'sellerPseudo' FROM book LEFT JOIN library ON book.id = library.book_id LEFT JOIN user ON library.user_id = user.id ORDER BY add_date DESC LIMIT {$limit}";
        } else {
            $sql = "SELECT book.id AS 'id', book.picture AS 'picture', book.title AS 'title', book.author AS 'author', book.description AS 'description', book.availability AS 'availability', book.add_date AS 'add_date', user.id as 'sellerId', user.pseudo as 'sellerPseudo' FROM book LEFT JOIN library ON book.id = library.book_id LEFT JOIN user ON library.user_id = user.id WHERE {$search} ORDER BY add_date DESC LIMIT {$limit}";
        }

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

    /**
     * Enregistre un livre.
     *
     * @param       $title        Titre du livre
     * @param       $author       Auteur du livre
     * @param       $description  Description du livre
     * @param mixed $availability
     *
     * @return true si l'ajout a réussi, sinon false
     */
    public function registerBook($title, $author, $description, $availability): bool
    {
        $sql = 'INSERT INTO book(title, author, description, availability, add_date) VALUES(:title, :author, :description, :availability, NOW())';
        $result = $this->db->query($sql, [
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'availability' => $availability,
        ]);

        return $result->rowCount() > 0;
    }

    /**
     * Met à jour le champ image du livre.
     *
     * @param $bookId  identifiant du livre
     * @param $picture chemin de l'image
     *
     * @return true si la mise à jour a réussi, sinon false
     */
    public function updatePicture($bookId, $picture): bool
    {
        $sql = 'UPDATE book set picture=:picture WHERE id=:bookId';
        $result = $this->db->query($sql, [
            'bookId' => $bookId,
            'picture' => $picture,
        ]);

        return $result->rowCount > 0;
    }

    /**
     * Récupère un Book à partir de ses informations.
     *
     * @param       $title        titre du livre
     * @param       $author       auteur du livre
     * @param       $description  description du livre
     * @param mixed $availability disponiblité du livre
     *
     * @return Book correspondant aux paramètres, sinon null
     */
    public function getBookByInfo($title, $author, $description, $availability): ?Book
    {
        $sql = 'SELECT * FROM book WHERE title=:title AND author=:author AND description=:description AND availability=:availability';
        $result = $this->db->query($sql, [
            'title' => $title,
            'author' => $author,
            'description' => $description,
            'availability' => $availability,
        ]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }

        return null;
    }

    /**
     * Renvoi un tableau de Book contenant les livres de l'utilisateur.
     *
     * @param $userId identifiant de l'utilisateur
     *
     * @return array tableau de Book de l'utilisateur
     */
    public function getUserBooks($userId): array
    {
        $sql = "SELECT book.id AS 'id', book.picture AS 'picture', book.title AS 'title', book.author AS 'author', book.description AS 'description', book.availability AS 'availability', book.add_date AS 'add_date', user.id as 'sellerId', user.pseudo as 'sellerPseudo' FROM book LEFT JOIN library ON book.id = library.book_id LEFT JOIN user ON library.user_id = user.id ORDER BY add_date DESC";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }

        return $books;
    }
}
