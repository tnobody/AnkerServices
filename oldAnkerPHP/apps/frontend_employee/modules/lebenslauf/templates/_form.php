<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('lebenslauf/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?ll_id='.$form->getObject()->getLlId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('lebenslauf/index') ?>">Zurück zur Übersicht</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Löschen', 'lebenslauf/delete?ll_id='.$form->getObject()->getLlId(), array('method' => 'delete', 'confirm' => 'Sind Sie sicher, dass Sie diesen Eintrag löschen wollen?')) ?>
          <?php endif; ?>
          <input type="submit" value="Speichern" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
