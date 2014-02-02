<?php use_helper('Date') ?>

<h2>Dokument: <?php echo $dokumente->getTitel() ?></h2>

<table>
  <tbody>
    <tr>
      <th>Titel:</th>
      <td><?php echo file_exists(sfConfig::get('sf_upload_dir') . '/dokumente/' . $dokumente->getPfad()) ? '<a href="/uploads/dokumente/' . $dokumente->getPfad() . '">'.$dokumente->getTitel().'</a>' : '<span style="color: red;">Die Datei konnte nicht gefunden werden</span>' ?></td>
    </tr>
    <tr>
      <th>Eingestellt am:</th>
      <td><?php echo format_date($dokumente->getAngelegt()) ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('dokumente/edit?id='.$dokumente->getId()) ?>">Bearbeiten</a>
&nbsp;
<a href="<?php echo url_for('dokumente/index') ?>">Zurück zur Übersicht</a>
