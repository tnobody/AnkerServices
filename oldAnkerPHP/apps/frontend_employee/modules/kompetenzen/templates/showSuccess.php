<h2>Kompetenz Detailansicht</h2>
<form action="<?php echo url_for('kompetenzen/edit?kompetenz_id='.$kompetenzen->getKompetenzId()) ?>" method="post">
	<div class="form_settings">
		<p><span>Bezeichnung:</span><input type="text" readonly="readonly" value="<?php echo $kompetenzen->getBezeichnung() ?>" /></p>
		<p><span>Zertifikat:</span><input type="text" readonly="readonly" value="<?php echo $kompetenzen->getZertifikate()->getBezeichnung() ?>" /></p>
		<p><span>Kompetenzkategorie:</span><input type="text" readonly="readonly" value="<?php echo $kompetenzen->getKompetenzKategorien()->getBezeichnung() ?>" /></p>
		<p><span>Kompetenzerwerb:</span><input type="text" readonly="readonly" value="<?php echo $kompetenzen->getArtKompetenzerwerb() ?>" /></p>
		<p style="padding-top: 15px"><span>&nbsp;</span><?php echo link_to('Übersicht', 'kompetenzen/index', array('class' => 'button')) ?><input class="submit_2" type="submit" name="name" value="Bearbeiten" /></p>
	</div>
</form>
