## Projet TomTroc
Mise en contact de lectuers pour partager et échanger leurs livres
Portée du projet : MVP

## Architecture
L'architecture Modèle-Vue-Controleur est choisie

A ce stade la partie administration de la modération n'est pas nécessaire.
La partie responsive peut être un plus

## Fonctionnalités
Les fonctionnalités de cette application sont 
- Inscription et connexion des membres : Inscription directe, sans validation mail ou administrateur. Après inscription, l'utilisateur peut se connecter
- Page de profil des utilateurs : modification de profil possible par l'utilisateur. Consultation des profils des autres utilisateurs possible. Pas de liste des utilisateurs. La mise en relation se fait par la bibliothèque
- Bibliothèque personnelle présente dans la page "Mon compte" : description des livres (titre, auteur, image, description, disponibilité)
- Page "nos livres à l'échange" : consultation des livres qui peuvent être échangés, avec recherche (titre)
- Détail d'un livre : détail des informations du livre et lien vers la personne qui possède le livre et possibilité d'envoyer un message
- Messagerie : consultation des messages, vois fil de discussion, envoi de message et de réponse


## Informations
Utilisateur : pseudo, mail, password
    Bibliothèque de livres
    Inscription : auto inscription


Livre :  titre, auteur, description, image, disponibilité

Bibliothèque : lien utilisateur / livres
1 seule bibliothèque de livre par utilisateur

Messages : date/heure, auteur, message
    Envoi de message depuis la page d'un livre (initiation de la communication)
    poursuite de la communication par la page dédiée

## Pages de l'application
Page accueil : 
    Article avec lien la page 'livres à l'échange'
    derniers livres ajoutés avec lien vers chaque livre et lien vers la liste de tous les livres
    Article comment ça marche

Page livres à l'échange : 
    tous les livres disponibles
    Recherche (réponse dans la page)
    Lien vers chaque page de livre
    Pagination de l'affichage des livres

Page détail d'un livre (visu/modif)
    image, titre, auteur, description, utilisateur (+dispo si modif)
    Envoi de message entre utilisateur

Page inscription
    pseudo, mail, password

Page connexion
    mail, password

Page mon compte
    image, pseudo, membre depuis..., nb livres bibliothèque
    modification des informations personnelles : mail, password, pseudo
    liste des livres dans la bibliothèque utilisateur avec possibilté édition et suppression

Page compte public
    image, pseudo, membre depuis..., nb livres bibliothèque
    liste des livres dans la bibliothèque utilisateur

Page messagerie : 
    liste des conversations : image utilisateur, pseudo, date/heure dernier message, texte dernier message
    historique message + saisie et envoi message

Header : logo + Tomtroc / accueil / nos livres à l'échange / Messagerie / Mon compte / Connexion/Déconnexion

Footer : politique de confidentialité / Mentions légales / TomTroc© / logo

## Structure de données :
utilisateur : id / pseudo / mail / password / date/heure création / avatar

livre : id / image / titre / auteur / description / utilisateur déclarant / disponibilité

Bibliothèque : livre / utilisateur

Message : id / auteur / destinataire / message / date/heure



## Organisation des fichiers

Dossier config pour la configuration de la connexion à la base de données

Dossier css pour les fichiers de style

Dossier sql pour les fichiers d'import/export de la base de données

Dossier controlleurs pour les controlleurs
    userController.php
    bookController.php
    libraryController.php
    messageController.php

Dossier views pour les vues
    > welcome.php
    > bookExchange.php
    > bookDetail.php
    > logIn.php
    > signIn.php
    > account.php
    > chat.php
    > updateAccount.php
    privacyPolicy.php
    legalNotices.php

Dossier models pour les modèles
    dbManager.php
    user.php
    userManager.php
    book.php
    bookManager.php
    library.php
    libraryManager.php
    message.php
    messageManager.php
    abstractEntity.php
    abstractEntityManager.php

Fichier index.php : routeur
    showHome
    showBookExchange
    showBookDetail
    showLogIn
    showSignUp
    showAccount
    showChat
    showUpdateAccount
    updateAccount
    updateBookDetail
    addBook
    removeBook
    updateBook
    sendMessage

Dossier services pour les classes de fonctionnalités génériques


Ajouter l'état Lu/Non lu des messages

## Dette technique

Menu en responsive lors de l'appui sur le burger menu

Afficher dans le header le nombre de messages non lus

Convertir la date d'ajout de livre dans les fonctions setAddDate et getAddDate de la classe Book

page account : js pour affichage en responsive

Toutes les pages : travailler sur la variation de la taille d'écran

page account : modification de l'avatar de l'utilisateur

registerBook : vérifier qu'un livre avec le même titre et le même auteur n'existe pas déjà

addBook : rendre plus beau le bouton de sélection de l'image du livre

Nos livres à l'échange : JS : lors du clic sur la recherche, effacer le contenu si c'est le texte pas défaut qui est saisi

UpdateBook : réussir la prise en compte de la valeur précédente d'image pour la mise à jour (doit fonctionner sans modifier l'image, ce qui n'est pas le cas aujourd'hui)
