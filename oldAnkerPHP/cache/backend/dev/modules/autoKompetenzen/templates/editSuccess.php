<?php use_helper('I18N', 'Date') ?>
<?php include_partial('kompetenzen/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Kompetenzen', array(), 'messages') ?></h1>

  <?php include_partial('kompetenzen/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('kompetenzen/form_header', array('kompetenzen' => $kompetenzen, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('kompetenzen/form', array('kompetenzen' => $kompetenzen, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('kompetenzen/form_footer', array('kompetenzen' => $kompetenzen, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
