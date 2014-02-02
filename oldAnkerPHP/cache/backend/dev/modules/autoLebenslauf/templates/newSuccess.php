<?php use_helper('I18N', 'Date') ?>
<?php include_partial('lebenslauf/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Lebenslauf', array(), 'messages') ?></h1>

  <?php include_partial('lebenslauf/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('lebenslauf/form_header', array('lebenslauf' => $lebenslauf, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('lebenslauf/form', array('lebenslauf' => $lebenslauf, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('lebenslauf/form_footer', array('lebenslauf' => $lebenslauf, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
