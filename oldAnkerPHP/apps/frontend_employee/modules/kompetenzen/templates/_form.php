<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('kompetenzen/update?niveau_id='.$form->getObject()->getNiveauId()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('kompetenzen/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'kompetenzen/delete?niveau_id='.$form->getObject()->getNiveauId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['profil_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['profil_id']->renderError() ?>
          <?php echo $form['profil_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['kompetenz_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['kompetenz_id']->renderError() ?>
          <?php echo $form['kompetenz_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['zertifikat_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['zertifikat_id']->renderError() ?>
          <?php echo $form['zertifikat_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['erwerb_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['erwerb_id']->renderError() ?>
          <?php echo $form['erwerb_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['art_kompetenzerwerb']->renderLabel() ?></th>
        <td>
          <?php echo $form['art_kompetenzerwerb']->renderError() ?>
          <?php echo $form['art_kompetenzerwerb'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['niveau']->renderLabel() ?></th>
        <td>
          <?php echo $form['niveau']->renderError() ?>
          <?php echo $form['niveau'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lebenslauf_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['lebenslauf_list']->renderError() ?>
          <?php echo $form['lebenslauf_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
