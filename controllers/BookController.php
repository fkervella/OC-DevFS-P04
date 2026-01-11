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

    /**
     * Affiche la page d'ajout de livre.
     */
    public function showAddBook(): void
    {
        $view = new View("Ajout d'un livre");
        $view->render('addBook', [], 'addBook.css');
    }

    /**
     * Enregistre un livre.
     */
    public function registerBook(): void
    {
        $userId = htmlspecialchars(Utils::request('userId'));
        $title = htmlspecialchars(Utils::request('title'));
        $author = htmlspecialchars(Utils::request('author'));
        $description = htmlspecialchars(Utils::request('description'));
        $availability = htmlspecialchars(Utils::request('availability'));
        $image = htmlspecialchars(Utils::request('image'));

        if (empty($userId)) {
            throw new Exception('Ajout du livre impossible, structure incohérente');
        }

        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);

        if (!$user) {
            throw new Exception("Ajout du livre impossible par l'utilisateur actuel");
        }

        if (empty($title) || empty($author) || empty($description) || empty($availability)) {
            throw new Exception('Pour enregistrer le livre, les informations suivantes doivent être complétées : titre, auteur, description, disponibilité');
        }

        // vérifier si un même livre avec un même auteur n'existe pas déjà

        switch ($availability) {
            case 'available':
                $availabilityValue = 1;

                break;

            case 'unavailable':
                $availabilityValue = 0;

                break;

            default:
                $availabilityValue = 0;

                break;
        }

        $bookManager = new BookManager();
        $bookManager->registerBook($title, $author, $description, $availabilityValue);

        // récupérer l'id du livre enregistré
        $book = $bookManager->getBookByInfo($title, $author, $description, $availabilityValue);

        if (!$book) {
            throw new Exception("Une erreur est survenue lors de l'enregistrement du livre");
        }

        $bookId = $book->getId();

        $libraryManager = new LibraryManager();
        $libraryManager->addBook($userId, $bookId);

        $bookPicture = BOOK_PICTURES.$bookId;
        if (!isset($_FILES['image'])) {
            throw new Exception("L'image n'a pas pu être téléchargée.");
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $bookPicture)) {
            throw new Exception("L'image du livre n'a pas été téléchargée");
        }

        $bookManager->updatePicture($bookId, $bookPicture);

        Utils::redirect('showAccount&userId='.$userId);
    }
}
