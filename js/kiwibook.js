jQuery(document).ready(function() {
    jQuery("body").on("click", "#logout", function() {          
                    $.ajax({
                        dataType: 'json',
                        url:'?action=logout',
                        success: function(reponse) {
                            $('#message').html(reponse.message);
                            $('$logout').hide();
                        }
                    });
                });
    });