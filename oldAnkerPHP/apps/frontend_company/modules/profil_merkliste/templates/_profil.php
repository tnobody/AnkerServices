<?php $item = $sf_data->getRaw('item'); ?>

<?php include_partial('kompetenzen/availability', array(
            'item' => $item,
            'wochentage' => $sf_data->getRaw('wochentage'),
        ));
?>

<div class="profil_item_kompetenzen">
<span class="label">Verfügbare Kompetenzen nach Niveaustufen:</span>
    <ul>
<?php foreach ($item['kompetenzen'] as $niveau => $kompetenzen): ?>
        <ul class="niveaustufen"><?php echo $niveaustufen[$niveau]['Bezeichnung']; ?>:
<?php   foreach ($kompetenzen as $k): ?>
            <li>
            <span
            <?php   if(!in_array($k['kompetenz_id'], $item['kompetenz_ids'])): ?>
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

<div class="profil_item_kompetenzen_searched">
<span class="label">Suchbegriffe waren:</span>    
<?php foreach ($item['kompetenzen_searched'] as $key => $k): 

        // Alle Ausgaben extra hinschreiben, da sonst zwischen der Kompetenz und
        // dem Komma ein Leerzeichen bleibt

        // Beim vorletzten Element ein "und" davor stellen, wenn es mindestens
        // zwei Elemente gibt
        if ($key == (count($item['kompetenzen_searched']) - 2) 
                && count($item['kompetenzen_searched']) > 1 ): ?>
            <span><?php echo $k['bezeichnung'] ?></span> und 

<?php   // ansonsten bei allen außer dem letzten Element ein Komma "," anhängen
        elseif ($key != (count($item['kompetenzen_searched']) - 1)): ?>
            <span><?php echo $k['bezeichnung'] ?></span>,

<?php   // letztes Element 
        else: ?>
            <span><?php echo $k['bezeichnung'] ?></span>
<?php   endif; 

    endforeach; ?>    
</div>

