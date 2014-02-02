<?php use_helper('I18N', 'Date') ?>
<?php include_partial('anfragen/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Anfragen', array(), 'messages') ?></h1>

  <?php include_partial('anfragen/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('anfragen/form_header', array('anfragen' => $anfragen, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('anfragen/form', array('anfragen' => $anfragen, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('anfragen/form_footer', array('anfragen' => $anfragen, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
