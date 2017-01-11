$(document).ready(function () {
    murEnvoyer();

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
    var offset2 = 10;
    $("#plus-de-amis").click(function () {
        $.ajax({
            dataType: 'json',
            url: '?action=loadAmis&offset=' + offset2,
            success: function (reponse) {
                offset2 += 10;
                appendAmis(reponse.data.amis);
            }
        });
    });
});

function appendAmis(messages) {
    for (var i = 0; i < messages.length; i++) {
        var tmp = JSON.parse(messages[i]);
        var string = '<div id="profil">'
            + '<a href="?action=profil&id=' + tmp.id + '">'
            + '<div class="well">'
            + '<div class="row">'
            + '<div class="col-md-2 hidden-xs">';
        if (tmp.avatar) {
            string += '<img src=' + tmp.avatar + ' alt="avatar" width="50" height="50"/>'
        } else {
            string += '<img class="img-responsive" src="images/defaut.png" width="50" height="50">';
        }
        string += '</div>'
            + '<div class="col-md-10 col-xs-12">'
            + '<p id="birthday">' + tmp.date_de_naissance.date + ' </p>'
        if (tmp.statut) {
            string += '<p id="statut">' + tmp.statut + ' </p>';
        }
        string += '<p id="identite">' + tmp.prenom + ' ' + tmp.nom + ' </p>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</a>'
            + '</div>';
        $('#new-amis').append(string);
    }
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

function murEnvoyer() {
    $('#texte-submit').click(function () {
        $.ajax({
            dataType: 'json',
            data: {message: $.trim($('#texte').val())},
            url: '?action=envoyerPost',
            success: function (reponse) {
                $('#texte').val('');
                creerLesPosts(reponse);
            }
        });
    });
}


function creerLesPosts(reponse) {
    console.log(reponse);
    var string = '';
    var post = '';
    for (var i = (reponse.data.message.length - 1); i > -1; i--) {
        post = JSON.parse(reponse.data.message[i]);
        post.emetteur = JSON.parse(post.emetteur);
        post.post = JSON.parse(post.post);
        if (post != null) {
            string = '';
            string = "<div class='row'>"
                + "<div class='col-sm-4'>"
                + "<p>"
                + post.emetteur.prenom + " " + post.emetteur.nom
                + "</p>"
                + "</div>"
                + "<div class='col-sm-8'>"
                + "<p>"
                + post.post.texte
                + "</p>"
                + "</div>"
                + "</div>"
                + "</div>";
            $('#target-post').prepend(string);
        }
    }
}