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
        <table>
            <thead>
                <tr>
                    <th class="hImage">Photo</th>
                    <th class="hTitle">Titre</th>
                    <th class="hAuthor">Auteur</th>
                    <th class="hDescription">Description</th>
                    <th class="hAvailability">Disponiblité</th>
                    <th class="hActions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="oddRow">
                    <td>
                        <img src="img/detailLivre.jpg" alt="couverture livre">
                    </td>
                    <td>
                        <p class="bookTitle">The Kinfolk Table</p>
                    </td>
                    <td>
                        <p class="bookAuthor">Nathan Williams</p>
                    </td>
                    <td>
                        <p class="bookDescription">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par ce que j'ai lu. Et j'ai encore plein d'autres choses à dire dessu, mais pour le moment, il je dois aller à la piscine.</p>
                    </td>
                    <td>
                        <div class="available">disponible
                        </div>
                    </td>
                    <td>
                        <a href="" class="modifyBook">Editer</a>
                        <a href="" class="deleteBookFromLibrary">Supprimer</a>
                    </td>
                </tr>
                <tr class="evenRow">
                    <td>
                        <img src="img/detailLivre.jpg" alt="couverture livre">
                    </td>
                    <td>
                        <p class="bookTitle">The Kinfolk Table</p>
                    </td>
                    <td>
                        <p class="bookAuthor">Nathan Williams</p>
                    </td>
                    <td>
                        <p class="bookDescription">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par ce que j'ai lu</p>
                    </td>
                    <td>
                        <div class="unavailable">non dispo.
                        </div>
                    </td>
                    <td>
                        <a href="" class="modifyBook">Editer</a>
                        <a href="" class="deleteBookFromLibrary">Supprimer</a>
                    </td>
                </tr>
                <tr class="oddRow">
                    <td>
                        <img src="img/detailLivre.jpg" alt="couverture livre">
                    </td>
                    <td>
                        <p class="bookTitle">The Kinfolk Table</p>
                    </td>
                    <td>
                        <p class="bookAuthor">Nathan Williams</p>
                    </td>
                    <td>
                        <p class="bookDescription">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par ce que j'ai lu</p>
                    </td>
                    <td>
                        <div class="available">disponible
                        </div>
                    </td>
                    <td>
                        <a href="" class="modifyBook">Editer</a>
                        <a href="" class="deleteBookFromLibrary">Supprimer</a>
                    </td>
                </tr>
                <tr class="evenRow">
                    <td>
                        <img src="img/detailLivre.jpg" alt="couverture livre">
                    </td>
                    <td>
                        <p class="bookTitle">The Kinfolk Table</p>
                    </td>
                    <td>
                        <p class="bookAuthor">Nathan Williams</p>
                    </td>
                    <td>
                        <p class="bookDescription">J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par ce que j'ai lu</p>
                    </td>
                    <td>
                        <div class="unavailable">non dispo.
                        </div>
                    </td>
                    <td>
                        <a href="" class="modifyBook">Editer</a>
                        <a href="" class="deleteBookFromLibrary">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
