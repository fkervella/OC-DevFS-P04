<?php

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

    public function showBookExchange(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getSearchedBooks();

        $view = new View("Nos livres à l'échange");
        $view->render('bookExchange', [], 'bookExchange.css');
    }
}
