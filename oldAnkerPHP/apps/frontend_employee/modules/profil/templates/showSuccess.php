<?php use_helper('Date') ?>
<h2>Profildaten</h2>
<form action="<?php echo url_for('profil/edit?profil_id='.$profile->getProfilId()) ?>" method="post">
	<div class="form_settings">
		<p><span>Vorname:</span><input type="text" readonly="readonly" value="<?php echo $profile->getVornamen() ?>" /></p>
		<p><span>Nachname:</span><input type="text" readonly="readonly" value="<?php echo $profile->getNachname() ?>" /></p>
		<p><span>Geburtsort:</span><input type="text" readonly="readonly" value="<?php echo $profile->getGeburtsort() ?>" /></p>
		<p><span>Geburtsland:</span><input type="text" readonly="readonly" value="<?php echo $profile->getGeburtsland() ?>" /></p>
		<p><span>Nationalität:</span><input type="text" readonly="readonly" value="<?php echo $profile->getNationalitaet() ?>" /></p>
		<p><span>Geschlecht:</span><input type="text" readonly="readonly" value="<?php echo $profile->getGeschlecht() ?>" /></p>
		<p><span>Geburtstag:</span><input type="text" readonly="readonly" value="<?php echo format_date($profile->getGeburtsdatum(), 'dd/MM/yyyy') ?>" /></p>
		<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="name" value="Bearbeiten" /></p></a>
	</div>
</form>