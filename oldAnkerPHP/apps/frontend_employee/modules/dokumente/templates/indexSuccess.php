<h2>Meine Dokumente</h2>

<p>Hier finden Sie alle Dokumente, die Sie uns zur Verfügung gestellt haben. Hilfreich für eine baldige
Verwendung sind z.B. Zeugnisse, Bescheinigungen über besuchte Fortbildungen oder auch Arbeitsproben.<br/>
Wenn Sie den Dokumententitel anklicken, können Sie das Dokument einsehen.</p>

<table>
  <thead>
    <tr>
      <th>Titel</th>
      <th>Zuletzt geändert am</th>
      <th>Pfad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dokumentes as $dokumente): ?>
    <tr>
      <td><a href="<?php echo url_for('dokumente/show?id='.$dokumente->getId()) ?>"><?php echo $dokumente->getTitel() ?></a></td>
      <td><?php echo $dokumente->getLetzteAenderung() ?></td>
      <td><?php echo file_exists(sfConfig::get('dokumente_upload_dir') . $dokumente->getPfad()) ? '<a href="'. sfConfig::get('dokumente_upload_url') . $dokumente->getPfad() . '">'.$dokumente->getTitel().'</a>' : '<span style="color: red;">Die Datei konnte nicht gefunden werden</span>' ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('dokumente/new') ?>">Ein neues Dokument anlegen</a>
