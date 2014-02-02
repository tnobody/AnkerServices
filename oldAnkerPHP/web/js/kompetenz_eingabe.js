var time_4_slide_effekts = 1000;
var time_4_slide_Up_effekt= 1000;
var time_4_highlite_effekt = 1300;
var kompetenzanzeige_reload = false;

$(document).ready(function() {  

    function get_categories() {
        $('#kompetenz_details_kategorie_field').load(app + 'kompetenzen/get_categories');
    }

    // Kategorien initial abholen
    get_categories();

    // Daten übermitteln und Formular validieren
    $('#kompetenz_details_action').click(function() {
        if($("#kompetenzform").validationEngine('validate')) {
            $('#loader').show();
            $.post(
            app + 'kompetenzen/add', 
            { 
                title: $('#kompetenz_details_bezeichnung').val(),
                comment: $('#kompetenz_details_beschreibung').val(),
                // Falls keine neue Kompetenz erstellt wurde, die ID der Kategorie
                // mit übergeben
                id: ($('#kompetenzform_new').val()) ? '' : $('#kompetenz_id').val(),
                niveau: $("input[name='niveau']:checked").val(),                
                // Falls neue Kompetenz, die Übergeordnete Kategorie
                kategorie: ($('#kompetenzform_new').val()) ? $('#kompetenz_details_kategorie').val() : '',
                // Falls neue Kategorie, den neuen Namen übergeben
                name: ($('#kompetenzform_new').val() && $('#kompetenz_details_kategorie_name').val()) ? $('#kompetenz_details_kategorie_name').val() : '',
                new_kompetenz: $('#kompetenzform_new').val(),  
                _csrf_token: $('#_csrf_token').val(),
            },
            function(data) {
                if(data == true) {
                    $('#kompetenz_details_bezeichnung, #kompetenz_details_beschreibung, #kompetenz_details_kategorie_name')
                    .addClass('readonly')
                    .removeClass('focused') 
                    .val('');    
                    $("#kompetenzbaum").jstree('refresh');
                    // evtl. neue Kategorien holen
                    get_categories();
                    // Erfolgsmeldung anzeigen
                    var test = $('#kompetenz_details_feedback').text('Die Daten wurden gespeichert')
                    .dialog({ 
                        resizable: false, 
                        dialogClass: 'ui-state-highlight',
                        title: "Information"
                    });
                    test.dialog("widget").delay(2000).fadeOut(function(){ $(this).dialog('close'); });
                    // Keinen Radiobutton auswählen
                    $("input[name='niveau']:checked").removeAttr("checked");
                } else {
                    $('#kompetenz_details_feedback').text(data).dialog({ 
                        resizable: false, 
                        dialogClass: 'ui-state-highlight',
                        title: "Information"
                    });
                }
                $('#loader').hide(); 
            }
        );
        }
    });

    // Suche im Kompetenzbaum
    $("#kompetenzbaum_search_search_button").click(function () {
        $("#kompetenzbaum").jstree("search", $('#search_keywords').val());
    });
    
    // Suche im Kompetenzbaum abbrechen
    $("#kompetenzbaum_search_clear").click(function (e) {
        e.preventDefault();
        $("#kompetenzbaum").jstree("clear_search");
        $('#kompetenzbaum_search_num_results').empty();
        $('#search_keywords').val('');
    });

    // Beim Klick auf "Öffnen" alle Knoten öffnen
    $('#kompetenzbaum_open_all').click(function(e) {
        e.preventDefault();
        $('#kompetenzbaum').jstree('open_all');
    });

    // Beim Klick auf "Schließen" alle Knoten schließen
    $('#kompetenzbaum_close_all').click(function(e) {
        e.preventDefault();
        $('#kompetenzbaum').jstree('close_all');
    });

    // Beim Klick auf "erstellen" das Formular anpassen
    $('#kompetenzform_new_link').click(function(e) {
        e.preventDefault();
        
        kompetenzanzeige_reload = true;
        //Anzeigender Text ausblend
        $('#kompetenz_details').slideUp(time_4_slide_Up_effekt, function (){
            //Beschreibungsteile ausblenden
            $('#unter_ueberschrift_kompetenz_anzeige').hide();
            $('#kompetenz_details_anzeige_bezeichnung').hide();
            $('#kompetenz_details_anzeige_beschreibung').hide();





            // Alle Formelemente initial nicht hervorgehoben
            $('#kompetenz_details').find('input[type=text], textarea, fieldset').
                removeClass('focused');
            // Textfelder editierbar machen
            $('#kompetenz_details_beschreibung').attr('disabled', false);
            // Bezeichnung anwählen
            $('#kompetenz_details_bezeichnung').attr('disabled', false).focus().select();     
            // Button anpassen
            $('#kompetenz_details_action').text('Erstellen');
            // Neuen Eintrag im Formular hinterlegen
            $('#kompetenzform_new').val('true');

            // Auswahlfeld für übergeordnete Kategorie darstellen
            $('#kompetenz_details_kompetenz_neu').show();
            $('#unter_ueberschrift_kompetenz_erstellen').show();
            $('#kompetenz_details_kategorie_div').show();
            
            //Unterseite "Neue Kompetenz anlegen" einblenden
            $('#kompetenz_details').slideDown(time_4_slide_effekts, function (){
                $('#kompetenz_details').effect("highlight", {} , time_4_highlite_effekt);
            });
            
        });
        
        
        
        
    });

    // Neue Kategorie anlegen
    $('#kompetenzform_kategorie_new_link').click(function(e) {
        e.preventDefault();
        $('#kompetenz_details_kategorie_neu').slideDown();
        $('#kompetenz_details_kategorie_name').focus().select();
    });    

    // Neue Kategorie abbrechen
    $('#kompetenzform_kategorie_abbort_link').click(function(e) {
        e.preventDefault();
        $('#kompetenz_details_kategorie_neu').slideUp();
        $('#kompetenz_details_kategorie_name').val('');
    });  

    // Fokusierte Formularelemente hervorheben
    $('#kompetenz_details').find('input[type=text], textarea').focus(function() {
        $(this).addClass('focused');  
    })
    .focusout(function() {
        $(this).removeClass('focused');
    });

    $('#kompetenz_details_niveau_fieldset input[type=radio]').focus(function() {
        $('#kompetenz_details_niveau_fieldset').addClass('focused');        
    })
    .focusout(function() {
        $('#kompetenz_details_niveau_fieldset').removeClass('focused');
    });


    $(function () {
        $("#kompetenzbaum").jstree({
            "json_data" : {
                "ajax" : {
                    "url" : app + 'kompetenzen/get_json',
                }                        
            },
            "search" : {
                "search_method" : "jstree_contains",
                "show_only_matches": true
            },
            "themes" : {
                "theme" : "default",	
            },
            "plugins" : [ "themes", "json_data", "ui", "search" ]
        })
        .bind("search.jstree", function (e, data) {
            $('#kompetenzbaum_search_num_results').text(data.rslt.nodes.length + 
                ' Treffer für "' + data.rslt.str + '"').slideDown();
        })
        
        /***********Element im Tree ausgewählt*******/////
        .bind("select_node.jstree", function (e, data) { 
            if(kompetenzanzeige_reload == true){
                $('#kompetenz_details').slideUp(time_4_slide_Up_effekt, function (){
                    //Alle nicht benötigeten Felder ausblenden
                    $('#kompetenz_details_kompetenz_neu').hide();
                    $('#unter_ueberschrift_kompetenz_erstellen').hide();
                    $('#kompetenz_details_kategorie_div').hide();
                    
                    //Kompentenzen-Anzeigen-Felder einblenden
                    $('#unter_ueberschrift_kompetenz_anzeige').show();
                    $('#kompetenz_details_anzeige_bezeichnung').show();
                    $('#kompetenz_details_anzeige_beschreibung').show();
                    
                    kompetenzanzeige_reload = false;
                })
                
            }
            
            $('#kompetenz_details').slideDown(time_4_slide_effekts, function (){
                $('#kompetenz_details').effect("highlight", {} , time_4_highlite_effekt);
            });
         

            
            
            
            
            // Daten des Knotens darstellen
            $('#kompetenz_details_anzeige_bezeichnung').delay(30).html(data.rslt.obj.data("bezeichnung")).text();
            $('#kompetenz_details_anzeige_beschreibung').delay(30).html(data.rslt.obj.data("beschreibung")).text();
            $('#kompetenz_details_anzeige_beschreibung').scrollTop(0);
            /* Nicht mehr für anzeige nötig
            $('#kompetenz_details_bezeichnung').val(data.rslt.obj.
                data("bezeichnung")); 
            $('#kompetenz_details_beschreibung').val(data.rslt.obj.
                data("beschreibung"));

            // Felder auf readonly setzen und entsprechend formatieren
            $('#kompetenz_details_bezeichnung').attr('disabled', true);
            $('#kompetenz_details_beschreibung').attr('disabled', true);
            */


            // Niveaueingabe fokusieren
            $('#kompetenz_details_niveau_fieldset').addClass('focused');

            // Kategorie muss nicht angegeben werden
            //$('#kompetenz_details_kompetenz_neu').slideUp();
            //$('#kompetenz_details_kategorie_neu').slideUp();
            $('#kompetenzform_new').val('');

            // Wenn eine Kompetenz angewählt wurde, dass hidden field updaten
            // ansonsten keine id übergeben
            if(data.rslt.obj.data("id")) {
                $('#kompetenz_id').val(data.rslt.obj.data("id"));
                $('#kompetenz_details_action').attr('disabled', false);
                // Wenn es sich beim angeklickten Element um eine Kompetenz handelt,
                // die der Nutzer bereits inne hat
                if (data.rslt.obj.data('niveau')) {
                    // entsprechenden Radiobutton auswählen
                    $("input[name='niveau'][value='"+data.rslt.obj.data('niveau')+"']").attr("checked","checked");
                    // Button anpassen
                    $('#kompetenz_details_action').text('Aktualisieren');
                } else {
                    // Keinen Radiobutton auswählen
                    $("input[name='niveau']:checked").removeAttr("checked");
                    // Button anpassen
                    $('#kompetenz_details_action').text('Speichern');
                }
            } else {
                $('#kompetenz_id').val('');
                $('#kompetenz_details_action').attr('disabled', true);
                // Button anpassen
                $('#kompetenz_details_action').text('Speichern');
            }
        })
        .bind("reopen.jstree", function(e, data) {
            // Ersten Knoten initial öffnen
            $("#kompetenzbaum").jstree('open_node', 
                $('#kompetenzbaum').find('li:first')
            );
        });

        $.jstree._themes = "/css/jstreethemes/";

    });
    
});