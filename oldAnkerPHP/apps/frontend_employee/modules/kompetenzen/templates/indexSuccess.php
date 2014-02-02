<?php use_stylesheet('frontend_employee/kompetenzen.css'); ?>

<h2>Meine Kompetenzen</h2>

<a href="<?php echo url_for('kompetenzen/new') ?>">Kompetenzen anlegen / aktualisieren</a><br><br>

<?php if ($niveaus): ?>
    <?php
    $lastniveau = 0;
    foreach ($niveaus as $niveau):
        if ($niveau->getNiveau() != $lastniveau):
            // Alten Bereich schließen, wenn er vorhanden war 
            if ($lastniveau != 0):
                ?>
                    </ul>
                </div>
                <div class="clearer"></div>
                <?php
            endif;

            // Neuen Bereich aufmachen
            $lastniveau = $niveau->getNiveau();
            ?>
            <div class="niveaufield">
                <h3>Niveau <?php echo $niveaustufen[$niveau->getNiveau()]['Bezeichnung']; ?></h3>
                <ul class="niveaulist">
        <?php endif; ?>
                    <li>
                        <div class="head">
                            <div class="name"><?php echo $niveau->getKompetenzen()->getBezeichnung() ?></div>
                            <div class="info">
                                <?php if(!$niveau->getKompetenzen()->getAktiv()): ?>
                                    Diese Kompetenz wurde noch nicht verifiziert
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="description">
                            <?php echo $niveau->getKompetenzen()->getBeschreibung() ?>    
                        </div>
                    </li>  

    <?php endforeach; 

    if ($lastniveau != 0): ?>
                </ul>
            </div>
            <div class="clearer"></div>
            <?php
    endif;
                    
    else: ?>
    <p>Sie haben noch keine Kompetenzen angegeben.</p>
<?php endif; ?>

   
