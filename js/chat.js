/**
 * @author Estelle Corsetti
 */

$(document).ready(function () {
    chatIni();
    chatEnvoyer();
});

function chatEnvoyer() {
    $('#envoyer-chat').click(function () {
        $.ajax({
            dataType: 'json',
            data: {message: $.trim($('#message').val())},
            url: '?action=envoyerChat',
            success: function (reponse) {
                $('#message').val('');
                creerLesChats(reponse);
            }
        });
    });
}
function chatIni() {
    $('#chat-window').dialog({
        title: "Chat",
        autoOpen: false,
        width: 600,
        height: 400
    });
    $('#chat-button-window').click(function () {
        loadChat();
        $("#chat-window").dialog("open");
        $("#chat-window").toggleClass('hidden');
    });
}

function loadChat() {
    $.ajax({
        dataType: 'json',
        url: '?action=loadChat',
        success: function (reponse) {
            if (reponse.data.chat.length != 0) {
                creerLesChats(reponse);
            }
        }
    });
}

function creerLesChats(reponse) {
    var string = '';
    var chat = '';
    for (var i = (reponse.data.chat.length - 1); i > -1; i--) {
        chat = JSON.parse(reponse.data.chat[i]);
        chat.emetteur = JSON.parse(chat.emetteur);
        chat.post = JSON.parse(chat.post);
        if (chat != null) {
            string = '';
            string = "<div class='row'>"
                + "<div class='col-sm-4'>"
                + "<p>"
                + chat.emetteur.prenom + " " + chat.emetteur.nom
                + "</p>"
                + "</div>"
                + "<div class='col-sm-8'>"
                + "<p>"
                + chat.post.texte
                + "</p>"
                + "</div>"
                + "</div>"
                + "</div>";
            $('#target-chat').prepend(string);
        }
    }
}
