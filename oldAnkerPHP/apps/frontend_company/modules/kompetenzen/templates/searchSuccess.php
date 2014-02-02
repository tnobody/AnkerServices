<?php use_stylesheet('token-input-facebook.css', 'first'); ?>

<h2>Nach Kompetenzen suchen</h2>

<?php use_javascript('search.js'); ?>

<?php include_partial('searchform') ?>

<div id="kompetenzen_results">
    <?php 
    if(!$sf_data->getRaw('no_entries')) {
        include_partial('kompetenzen/profilelist', array(
            'kompetenzen_searched' => $sf_data->getRaw('kompetenzen_searched'),
            'entries' => $sf_data->getRaw('entries'),
            'kompetenz_ids' => $sf_data->getRaw('kompetenz_ids'),
            'wochentage' => $sf_data->getRaw('wochentage'),
            'niveaustufen' => $niveaustufen
            )); 
    } else {
        include_partial('kompetenzen/noresults');
    }        
    ?>
</div>
