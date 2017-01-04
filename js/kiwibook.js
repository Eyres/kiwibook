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
    for (var i = 0; i < messages.length; i++) {
        var tmp = JSON.parse(messages[i]);
        tmp.destinataire = JSON.parse(tmp.destinataire);
        tmp.emetteur = JSON.parse(tmp.emetteur);
        tmp.parent = JSON.parse(tmp.parent);
        tmp.post = JSON.parse(tmp.post);
        var string = '<div class="wrapper">'
            + '<div class="row">'
            + '<div class="col-sm-3">';
        if (tmp.emetteur.avatar) {
            string += '<img class="img-responsive" src="' + tmp.emetteur.avatar + '">';
        } else {
            string += '<img class="img-responsive" src="images/defaut.png">';
        }
        string += '</div>'
            + '<div class="col-sm-9">'
            + '<div class="row">'
            + '<div class="col-sm-3">'
            + '<h6>De :'
            + tmp.emetteur.nom
            + tmp.emetteur.prenom
            + '</h6>'
        if (tmp.destinataire && tmp.emetteur) {
            if (tmp.destinataire.id !== tmp.emetteur.id) {
                string += '<h6>'
                    + 'à'
                    + tmp.destinataire.nom
                    + tmp.destinataire.prenom
                    + '</h6>';
            }
        }
        string += '</div>'
            + '<div class="col-sm-9">'
            + '<p>' + tmp.post.texte + '</p>';
        if (tmp.post.image) {
            string += '<img class="img-responsive" src="' + tmp.post.image + '">';
        }
        string += '</div>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '<div class="row">'
            + '<div class="col-sm-3 col-sm-push-9">'
            + '<button id="like-' + tmp.id + '" class="btn btn-danger">';
        tmp.aime ? string += 0 : string += tmp.aime;
        string += '</button>'
            + '<button id="partage-' + tmp.id + '" class="btn btn-primary">'
            + 'Partager'
            + '</button>'
            + '</div>'
            + '</div>'
            + '</div>';
        $('#new-message').prepend(string);
    }
}
