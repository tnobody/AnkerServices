<?php 
    $item = $sf_data->getRaw('item'); 
    $wochentage = $sf_data->getRaw('wochentage');
?>

<div class="profil_item_availability">
    <ul>
        <?php $maximum = $item['verfuegbarkeiten']['maximum']; ?>
        <?php foreach ($wochentage as $key => $value): ?>
        <?php 
                if($maximum > 0) {
                    // Verfügbarkeit pro Wochentag im Vergleich zu dem 
                    // Wochentag mit der maximalen Verfügbarkeit
                    $anteil = round($item['verfuegbarkeiten'][$value] / $maximum, 1) * 10; 
                } else {
                    $anteil = 0;
                }

                if($anteil > 6) {
                    $type = 'high';
                } else if($anteil > 3) {
                    $type = 'medium';
                } else {
                    $type = 'low';
                }
        ?>
            <li class="<?php echo $type ?>"><p class="day"><?php echo $key ?></p> <span class="value <?php echo $type ?>"><?php echo $item['verfuegbarkeiten'][$value] ?></span></li>
        <?php endforeach; ?>
    </ul>           
</div>

<div class="ajax-loader" id="ajax-loader_<?php echo $item['profil_id'] ?>">
    <?php echo image_tag('ajax-loader.gif'); ?>
</div>