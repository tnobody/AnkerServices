<h1>Hinterlegen Sie Ihre Kompetenzen</h1>

<?php use_stylesheet('frontend_employee/kompetenzen.css'); ?>
<?php use_javascript('kompetenz_eingabe.js'); ?>


    Wählen Sie ihre Kompetenzen aus den nachfolgendem Kompetenzbaum aus, oder suchen Sie ihre Kompetenzen.
    
    <?php //<h4>Beachten Sie dabei auch die Einordnung in die richtige Kategorie</h4> ?>


<div id="kompetenzbaum_search" class="form_settings">   
    <label for="search_keywords">Suchbegriff:</label>
    <input id="search_keywords" type="text" />
    <button id="kompetenzbaum_search_search_button" class="submit_2">Suchen</button>
    <a href="#" id="kompetenzbaum_search_clear">Löschen</a>
</div>

<div id="kompetenzbaum_left">
    <div id="unter_ueberschrift_kompetenzbaum"> Kompetenzbaum:</div>
    <div id="kompetenzbaum_search_num_results"></div>
    Kompetenzen, die sie bereits gespeichert haben, werden <span class="mine">hervorgehoben</span> dargestellt.<br><br>
    Alle Knoten: <a href="#" id="kompetenzbaum_open_all">Öffnen</a> - 
    <a href="#" id="kompetenzbaum_close_all">Schließen</a>
    <br><br>
    <div id="kompetenzbaum"></div>
    <br>
    <div id="text2">
        Falls Sie keine passende Kompetenz finden konnten, 
        <a href="#" id="kompetenzform_new_link">erstellen</a> Sie diese bitte mit einem Kommentar: 
    </div>
</div>



<div id="kompetenz_details" class="form_settings">
    <div id="kompetenz_details_anzeige"> 
        <div id="unter_ueberschrift_kompetenz_anzeige"> Kompetenzen-Beschreibung: </div>
        <div id="kompetenz_details_anzeige_bezeichnung"> </div>
        <div id="kompetenz_details_anzeige_beschreibung"></div>
    </div>   
    
    <div id="unter_ueberschrift_kompetenz_erstellen">Neue Kompetenz anlegen: </div>
    
    <form id="kompetenzform">
        <input type="hidden" id="kompetenz_id" value="" />
        <input type="hidden" id="_csrf_token" value="<?php echo $token ?>"/>
        <input type="hidden" id="kompetenzform_new" value=""/>
        
        <div id="kompetenz_details_kompetenz_neu">
            <label for="kompetenz_details_bezeichnung">Bezeichnung:</label>
            <input id="kompetenz_details_bezeichnung" type="text" class="validate[required]" disabled="disabled"/>
            <label for="kompetenz_details_beschreibung">Beschreibung:</label>
            <textarea id="kompetenz_details_beschreibung" class="validate[required]" disabled="disabled"></textarea>
        </div>
       
        <label for="kompetenz_details_niveau">Niveau:</label>
        <fieldset id="kompetenz_details_niveau_fieldset">
        <?php         
        foreach ($niveaustufen as $key => $niveau) {
        ?>
        <input type="radio" name="niveau" id="niveau_<?php echo $key ?>" value="<?php echo $key ?>" class="validate[required] radio" /><span><?php echo $niveau['Bezeichnung'] ?></span></br>
        <div class="kompetenz_details_niveau_beschreibung"><?php echo $niveau['Beschreibung'] ?></div>
        <?php    
        } 
        ?>
        </fieldset>   
                
        <div id="kompetenz_details_kategorie_div">
            <label for="kompetenz_details_kategorie">Übergeordnete Kategorie:</label>
            <div id="kompetenz_details_kategorie_field"></div>
            <a href="#" id="kompetenzform_kategorie_new_link">Neue Kategorie</a>   
            <div class="clearer"></div>
        </div>

        <div id="kompetenz_details_kategorie_neu">
            <label for="kompetenz_details_kategorie_name">Name der neuen Kategorie:</label>
            <a href="#" id="kompetenzform_kategorie_abbort_link">X</a>
            Wählen Sie einen individuellen Namen, der noch nicht im Kompetenzbaum existiert! 
            <input id="kompetenz_details_kategorie_name" type="text" class="validate[groupRequired[kategorie]]"/>
        </div>

             
    </form>    
    
    <div id="ajax-loader">
        <?php echo image_tag('ajax-loader.gif', 'id=loader style=vertical-align: middle; display: none;') ?>
    </div>    
    <button id="kompetenz_details_action" class="submit">Speichern</button>
    <div id="kompetenz_details_feedback"></div>
</div>
