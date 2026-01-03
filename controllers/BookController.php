<?php

/**
 * \brief Contient la logique de l'entité Book.
 */
class BookController
{
    /**
     * Affiche la page d'accueil.
     */
    public function showHome(): void
    {
        $bookManager = new BookManager();
        $lastAddedBooks = $bookManager->getLastAddedBooks(4);

        if ($lastAddedBooks) {
            $view = new View('Accueil');
            $view->render('welcome', [], 'welcome.css');
        } else {
            throw new Exception('Les données des derniers livres ajoutés sont incomplètes');
        }
    }

    /**
     * Affiche les livres disponibles à l'échange.
     */
    public function showBookExchange(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getSearchedBooks();

        if ($books) {
            $view = new View("Nos livres à l'échange");
            $view->render('bookExchange', [], 'bookExchange.css');
        } else {
            throw new Exception("Les données des livres à l'échange sont incomplètes");
        }
    }

    /**
     * Affiche les données du livre.
     *
     * @param mixed $bookId
     */
    public function showBookDetail($bookId): void
    {
        $bookManager = new BookManager();
        $book = $bookManager->getBookDetail($bookId);

        if ($book) {
            $view = new View($book->getTitle());
            $view->render('bookDetail', [], 'bookDetail.css');
        } else {
            throw new Exception('Les données du livre sont incomplètes.');
        }
    }
}
