Projet TomTroc
Mise en contact de lectuers pour partager et échanger leurs livres

Portée du projet : MVP

L'architecture Modèle-Vue-Controleur est choisie

A ce stade la partie administration de la modération n'est pas nécessaire.
La partie responsive peut être un plus

Les fonctionnalités de cette application sont 
- Inscription et connexion des membres : Inscription directe, sans validation mail ou administrateur. Après inscription, l'utilisateur peut se connecter
- Page de profil des utilateurs : modification de profil possible par l'utilisateur. Consultation des profils des autres utilisateurs possible. Pas de liste des utilisateurs. La mise en relation se fait par la bibliothèque
- Bibliothèque personnelle présente dans la page "Mon compte" : description des livres (titre, auteur, image, description, disponibilité)
- Page "nos livres à l'échange" : consultation des livres qui peuvent être échangés, avec recherche (titre)
- Détail d'un livre : détail des informations du livre et lien vers la personne qui possède le livre et possibilité d'envoyer un message
- Messagerie : consultation des messages, vois fil de discussion, envoi de message et de réponse



Utilisateur : pseudo, mail, password
    Bibliothèque de livres
    Inscription : auto inscription


Livre :  titre, auteur, description, image, disponibilité

Bibliothèque : lien utilisateur / livres
1 seule bibliothèque de livrs par utilisateur

Messages : date/heure, auteur, message
    Envoi de message depuis la page d'un livre (initiation de la communication)
    poursuite de la communication par la page dédiée



Page accueil : 
    Article avec lien la page 'livres à l'échange'
    derniers livres ajoutés avec lien vers chaque livre et lien vers la liste de tous les livres
    Article comment ça marche

Page livres à l'échange : 
    tous les livres disponibles
    Recherche
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


structure de données :
utilisateur : pseudo / mail / password / date/heure création / avatar

livre : image / titre / auteur / description / utilisateur déclarant / disponibilité

Bibliothèque : livre / utilisateur

Message : auteur / destinataire / message / date/heure
