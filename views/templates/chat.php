<?php

/**
 * Template pour afficher la page de messagerie.
 */
?>

<div class="content">
    <div class="column1">
        <h2>Messagerie</h2>
        <div class="chats">
            <div class="chat selectedChat">
                <img src="img/user.jpg" alt="">
                <div class="userName">Alexlecture
                </div>
                <div class="lastMessageDate">15:43
                </div>
                <p class="lastMessage">Lorem ipsum
                </p>
            </div>
            <div class="chat">
                <img src="img/user.jpg" alt="">
                <div class="userName">Nathalire
                </div>
                <div class="lastMessageDate">20:08
                </div>
                <p class="lastMessage">Lorem ipsum
                </p>
            </div>
            <div class="chat">
                <img src="img/user.jpg" alt="">
                <div class="userName">Sas634
                </div>
                <div class="lastMessageDate">15:08
                </div>
                <p class="lastMessage">Lorem ipsum
                </p>
            </div>

        </div>
    </div>
    <div class="column2">
        <div class="back">Retour
        </div>
        <div class="user">
            <img src="img/user.jpg" alt="">
            <div class="userNameMessage">Alexlecture
            </div>
        </div>
        <div class="messages">
            <div class="message rightAlign">
                <div class="userAvatar">
                </div>
                <div class="messageDate">21.08 15:44
                </div>
                <div class="messageText sentMessage">Lorem ipsum
                </div>
            </div>
            <div class="message leftAlign">
                <img class="userAvatar" src="img/user.jpg" alt="avatar">
                <div class="messageDate">21.08 15:48
                </div>
                <div class="messageText receivedMessage">Lorem ipsum 2
                </div>
            </div>
        </div>
        <form class="newMessage">
            <label for="newMessageText">Message: </label>
            <input type="text" class="newMessageText" id="newMessageText" value="Tapez votre message ici">
            <input type="submit" class="button" value="Envoyer"> 
        </form>
    </div>
</div>
