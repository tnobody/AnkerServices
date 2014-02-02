<?php use_helper('I18N', 'Date') ?>
<?php include_partial('dokumente/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Dokumente', array(), 'messages') ?></h1>

  <?php include_partial('dokumente/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('dokumente/form_header', array('dokumente' => $dokumente, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('dokumente/form', array('dokumente' => $dokumente, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('dokumente/form_footer', array('dokumente' => $dokumente, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
