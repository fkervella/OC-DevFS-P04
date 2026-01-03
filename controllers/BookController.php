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

        $view = new View('Accueil');
        $view->render('welcome', [], 'welcome.css');
    }

    /**
     * Affiche les livres disponibles à l'échange.
     */
    public function showBookExchange(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getSearchedBooks();

        $view = new View("Nos livres à l'échange");
        $view->render('bookExchange', [], 'bookExchange.css');
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

        $view = new View($book->getTitle());
        $view->render('bookDetail', [], 'bookDetail.css');
    }
}
