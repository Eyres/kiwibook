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

});

function chatIni() {
    $('#chat-window').dialog({
        title: "Chat",
        autoOpen: false
    });
    $('#chat-button-window').click(function () {
        $("#chat-window").dialog("open");
    });
}