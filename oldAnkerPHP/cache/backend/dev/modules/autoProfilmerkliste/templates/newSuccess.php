<?php use_helper('I18N', 'Date') ?>
<?php include_partial('profilmerkliste/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Profilmerkliste', array(), 'messages') ?></h1>

  <?php include_partial('profilmerkliste/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('profilmerkliste/form_header', array('profil_merkliste' => $profil_merkliste, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('profilmerkliste/form', array('profil_merkliste' => $profil_merkliste, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('profilmerkliste/form_footer', array('profil_merkliste' => $profil_merkliste, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
