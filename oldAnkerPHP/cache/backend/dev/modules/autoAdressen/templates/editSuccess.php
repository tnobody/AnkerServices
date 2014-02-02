<?php use_helper('I18N', 'Date') ?>
<?php include_partial('adressen/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Adressen', array(), 'messages') ?></h1>

  <?php include_partial('adressen/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('adressen/form_header', array('adressen' => $adressen, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('adressen/form', array('adressen' => $adressen, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('adressen/form_footer', array('adressen' => $adressen, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
