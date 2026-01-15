<?php

/**
 * Template pour afficher la page de messagerie.
 */
?>

<div class="content">
    <div class="column1">
        <h1>Messagerie</h1>
        <div class="chats">
            <?php foreach ($chats as $chat) { ?>

            <a href="index.php?action=showChat&chatId=<?php echo $chat->getId(); ?>">
                <div class="chat <?php
                                    if (!is_null($currentChat) && $currentChat->getId() === $chat->getId()) {
                                        echo 'selectedChat';
                                    }
                ?>">
                <img src="<?php echo $chat->getOtherUserAvatar(); ?>" alt="<?php echo $chat->getOtherUserPseudo(); ?>">
                    <div class="userName"><?php echo $chat->getOtherUserPseudo(); ?>
                    </div>
                    <div class="lastMessageDate"><?php echo $chat->getLastMessageDate(); ?>
                    </div>
                    <p class="lastMessage"><?php echo $chat->getLastMessage(); ?>
                    </p>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="column2">
        <?php if (!is_null($currentChat)) { ?>
            <div class="back">Retour
            </div>
            <div class="user">
            <img src="<?php echo $currentChat->getOtherUserAvatar(); ?>" alt="avatar de <?php echo $currentChat->getOtherUserPseudo(); ?>">
                <div class="userNameMessage"><?php echo $currentChat->getOtherUserPseudo(); ?>
                </div>
            </div>
            <?php if (isset($messages)) { ?>
            <div class="messages">
                <?php foreach ($messages as $message) { ?>
                <div class="message <?php
                       if ($message->getSenderID() === $userId) {
                           echo 'rightAlign';
                       } else {
                           echo 'leftAlign';
                       }
                    ?>">
                    <?php if ($message->getSenderID() === $userId) { ?>
                    <div class="userAvatar">
                    </div>
                    <?php } else { ?>
                    <img class="userAvatar" src="<?php echo $currentChat->getOtherUserAvatar(); ?>" alt="avatar de <?php echo $currentChat->getOtherUserPseudo(); ?>">
                    <?php } ?>
                    <div class="messageDate"><?php echo $message->getDatetime(); ?>
                    </div>
                        <div class="messageText sentMessage"><?php echo $message->getMessage(); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <form class="newMessage" action="index.php?action=sendMessage" method="post">
                <label for="newMessageText">Message: </label>
                <input type="text" class="newMessageText" name="newMessageText" id="newMessageText" value="Tapez votre message ici">
                <input type="hidden" name="chatId" value="<?php echo $currentChat->getId(); ?>">
                <input type="submit" class="button" value="Envoyer"> 
            </form>
        <?php } ?>
    </div>
</div>
