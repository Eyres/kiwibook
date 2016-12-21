<?php foreach ($context->chats as $chat) { ?>
    <div id="chat">
        <p id="emetteur">Message de :
            <?php echo $chat["emetteur"]->nom.' '.$chat["emetteur"]->prenom ?>
        </p>
        <p id="post">
            <?php echo $chat["post"]->texte; ?>
            <?php echo $chat["post"]->date->format('Y-m-d H:i:s'); ?>
        </p>
    </div>
<?php } ?>