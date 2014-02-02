<?php if(!$profil->getRawValue()->getProfilId()): ?>
	<p>Richte jetzt Dein <a href="<?php echo url_for('profil/new') ?>">neues Profil</a> ein.</p>
<?php else: ?>
	<p><?php echo link_to('Aktualisieren Sie ihre Kompetenzen', 'kompetenzen_new')?></p>
    <p><a href="<?php echo url_for('verfuegbarkeit/index') ?>">Aktualisieren Sie Ihre zeitliche Verfügbarkeit</a></p>
    <p><a href="<?php echo url_for('profil/new') ?>">Profil bearbeiten</a></p>
<?php endif ?>

