<?php use_helper('Date') ?>
<h2>Lebenslauf</h2>

<table>
  <thead>
    <tr>
      <th>Bezeichnung</th>
      <th>Beschreibung</th>
      <th>Art</th>
      <th>Beginn</th>
      <th>Ende</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lebenslaufs as $lebenslauf): ?>
    <tr>
      <td><a href="<?php echo url_for('lebenslauf/show?ll_id='.$lebenslauf->getLlId()) ?>"><?php echo $lebenslauf->getBezeichnung() ?></a></td>
      <td><?php echo $lebenslauf->getBeschreibung() ?></td>
      <td><?php echo $lebenslauf->getLebenslaufKategorien()->getBezeichnung() ?></td>
      <td><?php echo format_date($lebenslauf->getBeginn(), 'dd/MM/yyyy') ?></td>
      <td><?php echo format_date($lebenslauf->getEnde(), 'dd/MM/yyyy') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('lebenslauf/new') ?>">Neuen Abschnitt einfügen</a>
