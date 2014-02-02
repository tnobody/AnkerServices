<h2>Favoriten</h2>

<?php use_javascript('jquery-ui-1.8.4.custom.min.js'); ?>
<?php use_javascript('profil_merkliste.js'); ?>

<?php use_stylesheet('smoothness/jquery-ui-1.8.4.custom.css'); ?>

<?php
if ($sf_data->getRaw('no_entries')) {
    include_partial('profil_merkliste/noresults');
} else {
    ?>

    <ul class="profil_merkliste_list">
        <?php
        $entries = $sf_data->getRaw('entries');
        $wochentage = $sf_data->getRaw('wochentage');
        foreach ($entries as $item):
            ?>
            <li class="profil_item">  
                <?php
                include_partial('profil_merkliste/profil', array(
                    'item' => $item,
                    'wochentage' => $wochentage,
                    'niveaustufen' => $niveaustufen
                ));
                ?>    
                <div class="profil_item_contact">
                <?php if (!$item['anfrage_existiert']): ?>
                        <input class="profil_item_contact_button" 
                            id="profil_item_contact_button_<?php echo $item['profil_id'] ?>" 
                            type="button" 
                            value="Ansprechpartner kontaktieren"/>
                        <div class="profil_item_contact_text" 
                            id="profil_item_contact_text_<?php echo $item['profil_id'] ?>" 
                            title="Kontakt aufnehmen">
                            <form>
                                <fieldset>
                                    <label for="comment"><b>Optional:</b> 
                                        Nachricht an den Ansprechpartner:</label>
                                    <textarea name="comment" 
                                        id="profil_item_contact_comment_<?php echo $item['profil_id'] ?>">
                                    </textarea>
                                </fieldset>
                            </form>             
                        </div>
                <?php else: ?>
                        <span>Eine Anfrage wurde bereits gestellt</span>
                <?php endif; ?>
                </div>
                
                <div class="profil_item_actions">
                    <input id="profil_item_remove_<?php echo $item['profil_id'] ?>" 
                    type="button" value="Aus Favoriten entfernen"/>
                </div>
                
                <div class="clearer"></div>
            </li>
            <?php
        endforeach;
        ?>        
    </ul>

<?php } ?>
