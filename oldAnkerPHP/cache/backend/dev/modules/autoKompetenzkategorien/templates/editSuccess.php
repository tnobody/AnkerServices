<?php use_helper('I18N', 'Date') ?>
<?php include_partial('kompetenzkategorien/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Kompetenzkategorien', array(), 'messages') ?></h1>

  <?php include_partial('kompetenzkategorien/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('kompetenzkategorien/form_header', array('kompetenzkategorien' => $kompetenzkategorien, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('kompetenzkategorien/form', array('kompetenzkategorien' => $kompetenzkategorien, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('kompetenzkategorien/form_footer', array('kompetenzkategorien' => $kompetenzkategorien, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
