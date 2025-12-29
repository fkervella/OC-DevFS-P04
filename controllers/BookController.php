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
        $view->render('welcome', []);
    }
}
