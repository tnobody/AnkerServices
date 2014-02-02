<h2>Suchergebnis</h2>

<ul class="kompetenzen_search_resultlist">
    <?php
    $entries = $sf_data->getRaw('entries');
    $wochentage = $sf_data->getRaw('wochentage');
    foreach ($entries as $item):
    ?>
    <li class="profil_item">  
    <?php
        include_partial('kompetenzen/profil', array(
            'item' => $item,
            'wochentage' => $wochentage,
            'kompetenz_ids' => $sf_data->getRaw('kompetenz_ids'),
            'kompetenzen_searched' => $sf_data->getRaw('kompetenzen_searched'),
            'niveaustufen' => $niveaustufen
        ));
    ?>    
        <div class="profil_item_remember_this">
            <input id="profil_item_remember_this_button_<?php echo $item['profil_id'] ?>" type="button" value="Als Favorit markieren"/>
        </div>
    </li>
    <?php
    endforeach;
    ?>    

</ul>

