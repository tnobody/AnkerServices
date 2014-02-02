<?php 
    $hitpoints = 0; 
    $kompetenz_ids = $sf_data->getRaw('kompetenz_ids'); 
    $kompetenzen_searched = $sf_data->getRaw('kompetenzen_searched'); 
    $item = $sf_data->getRaw('item'); 
?>

<?php
    // TODO Wie berechnet sich die Trefferrate, wenn Oberkategorien ausgewählt wurden?

    // Siehe, ob die Kompetenz eines Profils in allen in der DB gefundenen
    // Kompetenzen (inkl. Duplikate) enthalten ist. Wenn ja erhöhe die 
    // Trefferzahl
    foreach ($item['kompetenzen'] as $k):
        if(in_array($k['kompetenz_id'], $kompetenz_ids)):
            $hitpoints++;
        endif;
    endforeach;

    // WICHTIG: Die Trefferquote berechnet sich aber aus der Zahl der
    // Treffer und der Zahl der gesuchten Begriffe
    $hitrate = round(((float)$hitpoints / count($kompetenzen_searched)) * 100);

    if($hitrate > 60) {
        $type = 'high';
    } else if($hitrate > 30) {
        $type = 'medium';
    } else {
        $type = 'low';
    }
?>

<div class="profil_item_hitrate <?php echo $type ?>">
    <?php echo $hitrate ?> %
</div>
