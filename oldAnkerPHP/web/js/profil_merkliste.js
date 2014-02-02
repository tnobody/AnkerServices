$(document).ready(function() {   

$('div.profil_item_contact_text').each(function(index) {
    id = this.id.split('_');
    id = id[id.length - 1];

    $(this).dialog({
        autoOpen: false,
        width: 400,
        buttons: {
            "Senden": function() {
                $(this).dialog('close');
                // Überschreibe Aktion aus close event: 
                // Favorit entfernen trotzdem nicht zulassen
                $('#profil_item_remove_' + id).prop('disabled', true);
                // AJAX Aktion sichtbar machen
                $('#ajax-loader_' + id).show();
                elem = $('#profil_item_contact_button_' + id);
                elem.prop('value', 'Anfrage wird gesendet');
                elem.prop('disabled', true);
                // uses the global var app, to be deliviered by template
                $.post(
                    app + 'favoriten/request/' + id, 
                    { 
                        comment: $('#profil_item_contact_comment_' + id).val(),
                    },
                    function(data) {
                        if(data == true) {
                            elem.prop('value', 'Anfrage gesendet');                            
                        } else {
                            alert('Die Anfrage konnte nicht gesendet werden!');
                            elem.prop('value', 'Ansprechpartner kontaktieren');
                            elem.prop('disabled', false);
                            // Favorit entfernen soll entsperrt werden
                            $('#profil_item_remove_' + id).prop('disabled', false);
                        }
                        $('#ajax-loader_' + id).hide();
                    }
                );

            },
            "Abbrechen": function() {
                $(this).dialog('close');
            }
        },
        close: function(event, ui) { 
            $('#profil_item_remove_' + id).prop('disabled', false);
        }
    });
});

$('input[type=button].profil_item_contact_button').click(function(){
    id = this.id.split('_');
    id = id[id.length - 1];
    $('#profil_item_contact_text_' + id).dialog('open');
    $('#profil_item_remove_' + id).prop('disabled', true);
});


function listener() {
    $('div.profil_item_actions input[type="button"]').click(function() {
        elem = $('#' + this.id);
        id = this.id.split('_');
        id = id[id.length - 1];
        $('#ajax-loader_' + id).show();
        $.ajax({
            type: 'DELETE',
            // uses the global var app, to be deliviered by template
            url: app + 'favoriten/delete/' + id,
            success: function(data) {
                if(data == true) {
                    parent = elem.parents('div .profil_item');
                    parent.fadeOut(1000, function () {
                        parent.remove();
                    });
                } else {
                    alert('Der Eintrag konnte nicht gelöscht werden!');
                }
                $('#ajax-loader_' + id).hide();
            }
        });
    });
}
// execute it to activate it
listener();

});


