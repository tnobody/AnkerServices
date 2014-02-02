<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php echo $form->renderGlobalErrors() ?>
<form action="<?php echo url_for('profil/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?profil_id='.$form->getObject()->getProfilId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
		<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>
	<div class="form_settings">
		<?php echo $form['profil_id'] ?>
		<?php echo $form['_csrf_token'] ?>
		<?php echo $form['vornamen']->renderError() ?>
		<p><span>Vorname:</span><?php echo $form['vornamen'] ?></p>
		
		<?php echo $form['nachname']->renderError() ?>
		<p><span>Nachname:</span><?php echo $form['nachname'] ?></p>
		
		<?php echo $form['geburtsort']->renderError() ?>
		<p><span>Geburtsort:</span><?php echo $form['geburtsort'] ?></p>
		
		<?php echo $form['geburtsland']->renderError() ?>
		<p><span>Geburtsland:</span><?php echo $form['geburtsland'] ?></p>
		
		<?php echo $form['nationalitaet']->renderError() ?>
		<p><span>Nationalität:</span><?php echo $form['nationalitaet'] ?></p>
		
		<?php echo $form['geschlecht']->renderError() ?>
		<p><span style="margin: 0px 0px 2px 0px;">Ich bin:</span><?php echo $form['geschlecht'] ?></p>
		
		<?php echo $form['geburtsdatum']->renderError() ?>
		<p><span style="margin: 0px 0px 2px 0px;">Geburtsdatum:</span><?php echo $form['geburtsdatum'] ?></p>
		<p style="padding-top: 15px"><span>&nbsp;</span><?php if ($form->getObject()->isNew()): ?>
															<input class="submit" type="submit" value="Speichern" /></p>
														<?php else: ?>
															<?php echo link_to('Löschen', 'profil/delete?profil_id='.$form->getObject()->getProfilId(), array('class' => 'button', 'method' => 'delete', 'confirm' => 'Sind Sie sicher, dass Sie Ihr Profil löschen wollen?')) ?>
															<input class="submit_2" type="submit" value="Speichern" /></p>
														<?php endif; ?>
	</div>
</form>