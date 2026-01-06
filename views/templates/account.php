<?php

/**
 * Template pour afficher la page d'accueil.
 */
?>

<div class="page">
<h2>Mon compte</h2>
<div class="content">
    <div class="row1">
        <div class="column1">
            <img src='img/user.jpg' alt='avatar utilisateur'>
            <a href="">modifier</a>
            <div class="pseudo">
                nathalire
            </div>
            <div class="memberSince">
                Membre depuis 1 an
            </div>
            <p>Bibliothèque</p>
            <div class="librarySize">
                4 livres
            </div>
        </div>
        <div class="column2">
            <div class="title">
                Vos informations personnelles
            </div>
            <form class="personalInfo">
                <label for="mail">Adresse email</label>
                <input type="text" class="mail" id="mail">
                <label for="password">Mot de passe</label>
                <input type="password" class="password" id="password">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="pseudo" id="pseudo">
                <input type="submit" class="button-reverse" value="Enregistrer">
            </form>

        </div>
    </div>
    <div class="row2">
        <div class="grid-header">
            <div class="grid-header-cell hImage">Photo</div>
            <div class="grid-header-cell hTitle">Titre</div>
            <div class="grid-header-cell hAuthor">Auteur</div>
            <div class="grid-header-cell hDescription">Description</div>
            <div class="grid-header-cell hAvailability">Disponiblité</div>
            <div class="grid-header-cell hActions">Actions</div>
        </div>
        <div class="grid-row oddRow">
            <div class="grid-row-cell hImage">
                <img src="img/detailLivre.jpg" alt="couverture livre">
            </div>
            <div class="grid-row-cell hTitle">
                <p class="bookTitle">The Kinfolk Table</p>
            </div>
            <div class="grid-row-cell hAuthor">
                <p class="bookAuthor">Nathan Williams</p>
            </div>
            <div class="grid-row-cell hDescription">
                <p class="bookDescription">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par ce que j'ai lu. Et j'ai encore plein d'autres choses à dire dessus, mais pour le moment, il je dois aller à la piscine.</p>
            </div>
            <div class="grid-row-cell hAvailability">
                <div class="available">disponible
                </div>
            </div>
            <div class="grid-row-cell hActions">
                <a href="" class="modifyBook">Editer</a>
                <a href="" class="deleteBookFromLibrary">Supprimer</a>
            </div>
        </div>
        <div class="grid-row evenRow lastRow">
            <div class="grid-row-cell hImage">
                <img src="img/detailLivre.jpg" alt="couverture livre">
            </div>
            <div class="grid-row-cell hTitle">
                <p class="bookTitle">The Kinfolk Table</p>
            </div>
            <div class="grid-row-cell hAuthor">
                <p class="bookAuthor">Nathan Williams</p>
            </div>
            <div class="grid-row-cell hDescription">
                <p class="bookDescription">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par ce que j'ai lu</p>
            </div>
            <div class="grid-row-cell hAvailability">
                <div class="unavailable">non dispo.
                </div>
            </div>
            <div class="grid-row-cell hActions">
                <a href="" class="modifyBook">Editer</a>
                <a href="" class="deleteBookFromLibrary">Supprimer</a>
            </div>
        </div>
    </div>
</div>
</div>
