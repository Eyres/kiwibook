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
        autoOpen: false,
        width: 600,
        height: 300
    });
    $('#chat-button-window').click(function () {
        $("#chat-window").dialog("open");
        $("#chat-window").toggleClass('hidden');
    });
}