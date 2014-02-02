<?php $kompetenz_ids = $sf_data->getRaw('kompetenz_ids'); ?>

<?php include_partial('kompetenzen/availability', array(
            'item' => $item,
            'wochentage' => $sf_data->getRaw('wochentage'),
        ));
?>

<?php /*include_partial('kompetenzen/hitrate', array(
            'item' => $item,
            'kompetenz_ids' => $sf_data->getRaw('kompetenz_ids'),
            'kompetenzen_searched' => $sf_data->getRaw('kompetenzen_searched'),
        ));*/
?>

<div class="profil_item_kompetenzen">
<span class="label">Verfügbare Kompetenzen nach Niveaustufen:</span>
    <ul>
<?php foreach ($item['kompetenzen'] as $niveau => $kompetenzen): ?>
        <ul class="niveaustufen niveau_<?php echo $niveau; ?>"><?php echo $niveaustufen[$niveau]['Bezeichnung']; ?>:
<?php   foreach ($kompetenzen as $k): ?>
            <li>
            <span
            <?php   if(!in_array($k['kompetenz_id'], $kompetenz_ids)): ?>
            <?php       echo 'style="color: #c0c0c0;"' ?>
            <?php   else: ?>
            <?php       echo 'style="font-weight: bold;"' ?>
            <?php   endif; ?>
            >
            <?php   echo $k['bezeichnung'] ?>
            </span>
            </li>
<?php   endforeach; ?>
        </ul>
<?php endforeach; ?>
    </ul>
</div>
