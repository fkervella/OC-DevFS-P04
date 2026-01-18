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
        /**
         * 1. Récupération des données des 4 derniers livres en base
         * 2. Affichage de la page Home si les données ont bien été récupérées.
         */

        // 1.
        $bookManager = new BookManager();
        $books = $bookManager->getLastAddedBooks(4);

        // 2.
        if ($books) {
            $view = new View('Accueil');
            $view->render('welcome', [
                'books' => $books,
            ], 'welcome.css');
        } else {
            throw new Exception('Les données des derniers livres ajoutés sont incomplètes');
        }
    }

    /**
     * Affiche les livres disponibles à l'échange.
     */
    public function showBookExchange(): void
    {
        /**
         * 1. Filtrage des données d'entrée
         * 2. Recherche des livres correspondant aux mots recherchés de recherche dans la base
         * 3. Affichage de la page avec les livres s'il y a des livres qui correspondent aux mots recherchés.
         */

        // 1.
        $keyWords = htmlspecialchars(Utils::request('searchWords'));
        $keyWordsArray = explode(' ', $keyWords);

        // 2.
        $bookManager = new BookManager();
        $books = $bookManager->getSearchedBooks(16, $keyWordsArray);

        // 3.
        if ($books) {
            $view = new View("Nos livres à l'échange");
            $view->render('bookExchange', [
                'books' => $books,
            ], 'bookExchange.css', 'bookExchange.js');
        } else {
            throw new Exception("Les données des livres à l'échange sont incomplètes");
        }
    }

    /**
     * Affiche les données d'un livre.
     */
    public function showBookDetail(): void
    {
        /**
         * 1. Filtrage des données d'entrée
         * 2. Récupération des données du livre*
         * 3. Récupération des données du vendeur du livre
         * 4. Affichage des données du livre si les données sont conformes.
         */

        // 1.
        $bookId = intval(htmlspecialchars(Utils::request('bookId', -1)));
        if (-1 === $bookId) {
            throw new Exception('Le numéro du livre indiqué est invalide : -1');
        }

        // 2.
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);

        // 3.
        $sellerId = $book->getSellerId();
        if (is_null($sellerId)) {
            throw new Exception('Les informations du vendeur livre n\'ont pas été trouvées');
        }

        $userManager = new UserManager();
        $user = $userManager->getUserById($sellerId);

        // 4.
        if ($book && $user) {
            $view = new View($book->getTitle());
            $view->render('bookDetail', [
                'book' => $book,
                'user' => $user,
            ], 'bookDetail.css');
        } else {
            throw new Exception('Les données du livre sont incomplètes.');
        }
    }

    /**
     * Affiche la page d'ajout de livre.
     */
    public function showAddBook(): void
    {
        /*
         * 1. Fitrage des données d'entrée
         * 2. Affichage de la page
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        // 2.
        $view = new View("Ajout d'un livre");
        $view->render('addBook', [], 'addBook.css');
    }

    /**
     * Enregistre un livre.
     */
    public function registerBook(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Traduction de la valeur de la disponibilité
         * 3. Vérification que le livre n'exsite pas déjà
         * 4. Enregistrement du livre
         * 5. Vérification que le livre a bien été enregisté et récupèration de son identifiant
         * 6. Ajout du livre dans la bibliothèque de l'utilisateur
         * 7. Téléchargement de l'image de l'utilisateur et enregistrement de son chemin avec les données du livre
         * 8. Redirection vers la page Mon compte
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $userId = intval(htmlspecialchars($_SESSION['userId']));
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
        // 2.
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

        // 3.
        $bookManager = new BookManager();

        if ($bookManager->existsBook($title, $author)) {
            throw new Exception('Un livre avec le même titre et le même auteur est déjà enregistré');
        }

        // 4.
        $bookManager->registerBook($title, $author, $description, $availabilityValue);

        // 5.
        $book = $bookManager->getBookByInfo($title, $author, $description, $availabilityValue);

        if (!$book) {
            throw new Exception("Une erreur est survenue lors de l'enregistrement du livre");
        }

        $bookId = $book->getId();

        // 6.
        $libraryManager = new LibraryManager();
        $libraryManager->addBook($userId, $bookId);

        // 7.
        $bookPicture = BOOK_PICTURES.$bookId;
        if (!isset($_FILES['image'])) {
            throw new Exception("L'image n'a pas pu être téléchargée.");
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $bookPicture)) {
            throw new Exception("L'image du livre n'a pas été téléchargée");
        }

        $bookManager->updatePicture($bookId, $bookPicture);

        // 8.
        Utils::redirect('showAccount');
    }

    /**
     * Affichage la page de mise à jour d'un livre.
     */
    public function showUpdateBook(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Récupération des données du livre
         * 3. Affichage de la page de mise à jour du livre
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $bookId = intval(htmlspecialchars(Utils::request('bookId')));

        // 2.
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);

        // 3.
        $view = new View('Mise à jour du livre');
        $view->render('updateBook', [
            'book' => $book,
        ], 'updateBook.css', 'updateBook.js');
    }

    /**
     * Suppression d'un livre : retrait de la bibliothèque de l'utilisateur et suppression de la ligne.
     */
    public function deleteBook(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Vérification de l'existence du vendeur du livre
         * 3. Vérification de l'existence du livre
         * 4. Suppression du livre
         * 5. Redirection vers la page Mon compte
         */

        // 1.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $bookId = intval(htmlspecialchars(Utils::request('bookId')));
        $userId = intval(htmlspecialchars($_SESSION['userId']));

        if (empty($userId)) {
            throw new Exception('Suppression du livre impossible, structure incohérente');
        }

        // 2.
        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);

        if (!$user) {
            throw new Exception("Suppression du livre impossible par l'utilisateur actuel");
        }

        if (empty($bookId)) {
            throw new Exception("Pour supprimer le livre, les informations du libre et de l'utilisateur doivent être complètes");
        }

        // 3.
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);

        if (!$book) {
            throw new Exception("Le livre n'est pas connu");
        }

        $result = $bookManager->deleteBookFromLibrary($userId, $bookId);

        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la suppression du livre de la bibliothèque de l'utilisateur");
        }

        // 4.
        $result = $bookManager->deleteBook($bookId);
        if (!$result) {
            throw new Exception('Une erreur est survenue lors de la suppression du livre');
        }

        // 5.
        Utils::redirect('showAccount');
    }

    /**
     * Met à jour le livre concerné.
     */
    public function updateBook(): void
    {
        /*
         * 1. Filtrage des données d'entrée
         * 2. Vérification de l'existence du livre
         * 3. Traduction de la disponibilité de texte en nombre
         * 4. Mise à jour des données du livre
         * 5. Mise à jour de l'image du livre
         * 6. Redirection vers la page Mon compte
         */
        if (!isset($_SESSION['userId'])) {
            Utils::redirect('showHome');
        }

        $bookId = intval(htmlspecialchars(Utils::request('bookId')));
        $userId = intval(htmlspecialchars($_SESSION['userId']));
        $title = htmlspecialchars(Utils::request('title'));
        $author = htmlspecialchars(Utils::request('author'));
        $description = htmlspecialchars(Utils::request('description'));
        $availability = htmlspecialchars(Utils::request('availability'));

        if (empty($bookId)) {
            throw new Exception('Modification du livre impossible, référence au livre manquante');
        }

        // 2.
        $bookManager = new BookManager();
        $book = $bookManager->getBookById($bookId);

        if (!$book) {
            throw new Exception('Modification du livre impossible, référence au livre non trouvée');
        }

        if (empty($userId)) {
            throw new Exception('Modification du livre impossible, structure incohérente');
        }

        $userManager = new UserManager();

        if (empty($title) || empty($author) || empty($description) || empty($availability)) {
            throw new Exception('Pour enregistrer le livre, les informations suivantes doivent être complétées : titre, auteur, description, disponibilité');
        }

        // vérifier si un même livre avec un même auteur n'existe pas déjà
        // 3.
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

        // 4.
        $bookManager->updateBook($book->getId(), $title, $author, $description, $availabilityValue);

        // 5.
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $bookPicture = BOOK_PICTURES.$book->getId();

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $bookPicture)) {
                throw new Exception("L'image du livre n'a pas été téléchargée");
            }
        }

        // 6.
        Utils::redirect('showAccount');
    }

    public function uploadBookPicture(): void
    {
        $bookId = intval(htmlspecialchars(Utils::request('id')));

        if (empty($bookId)) {
            Utils::redirect('showHome');
        }

        $bookPicture = BOOK_PICTURES.$bookId;
        if (!isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            throw new Exception("L'image n'a pas pu être téléchargée.");
        }

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $bookPicture)) {
            throw new Exception("L'image du livre n'a pas été téléchargée");
        }

        $bookManager = new BookManager();
        $bookManager->updatePicture($bookId, $bookPicture);

        Utils::redirect('showUpdateBook', ['bookId' => $bookId]);
    }
}
