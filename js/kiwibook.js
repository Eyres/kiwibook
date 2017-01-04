$(document).ready(function () {
    $("body").on("click", "#logout", function () {
        $.ajax({
            dataType: 'json',
            url: '?action=logout',
            success: function (reponse) {
                $('#message').html(reponse.message);
                $('$logout').hide();
            }
        });
    });
    chatIni();

    var offset = 10;
    $("#plus-de-post").click(function () {
        console.log('test');
        $.ajax({
            dataType: 'json',
            url: '?action=loadMessage&offset=' + offset,
            success: function (reponse) {
                offset += 10;
                appendMessages(reponse.data.messages);
            }
        });
    });
});

function chatIni() {
    $('#chat-window').dialog({
        title: "Chat",
        autoOpen: false,
        width: 600,
        height: 300
    });
    $('#chat-button-window').click(function () {
        $("#chat-window").dialog("open");
        $("#chat-window").toggleClass('hidden');
    });
}

function appendMessages(messages) {
        console.log(messages);
    for (var i = 0; i < messages.lenght; i++) {
        var tmp = JSON.parse(messages[i]);
        console.log(tmp);


        $('#new-message').prepend(
            '<div class="wrapper">'
            + '<div class="row">'
            + '<div class="col-sm-3">'
            + '<?php if (!empty($message->getEmetteur()->getAvatar())) { ?>'
            + '<img class="img-responsive" src="<?php echo $message->getEmetteur()->getAvatar(); ?>">'
            + '<?php } else { ?>'
            + '<img class="img-responsive" src="images/defaut.png">'
            + '<?php } ?>'
            + '</div>'
            + '<div class="col-sm-9">'
            + '<div class="row">'
            + '<div class="col-sm-3">'
            + '<h6>De :'
            + '<?php echo $message->getEmetteur()->getNom(); ?>'
            + '<?php echo $message->getEmetteur()->getPrenom(); ?>'
            + '</h6>'
            + '<?php if ($message->getDestinataire() && $message->getEmetteur()) { ?>'
            + '<?php if ($message->getDestinataire()->getId() !== $message->getEmetteur()->getId()) { ?>'
            + '<h6>'
            + 'à'
            + '<?php echo $message->getDestinataire()->getNom(); ?>'
            + '<?php echo $message->getDestinataire()->getPrenom(); ?>'
            + '</h6>'
            + '<?php } ?>'
            + '<?php } ?>'
            + '</div>'
            + '<div class="col-sm-9">'
            + '<p><?php echo $message->getPost()->getTexte(); ?></p>'
            + '<?php if (!empty($message->getPost()->getImage())) { ?>'
            + '<img class="img-responsive" src="<?php echo $message->getPost()->getImage(); ?>">'
            + '<?php } ?>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="row">'
            + '<div class="col-sm-3 col-sm-push-9">'
            + '<button id="like-<?php echo $message->getId(); ?>" class="btn btn-danger">'
            + '<?php echo empty($message->getAime()) ? 0 : $message->getAime(); ?>'
            + '</button>'
            + '<button id="partage-<?php echo $message->getId(); ?>" class="btn btn-primary">'
            + 'Partager'
            + '</button>'
            + '</div>'
            + '</div>'
            + '</div>');
    }
}
