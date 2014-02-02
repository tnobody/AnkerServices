<?php use_helper('Date') ?>
<table>
  <tbody>
    <tr>
      <th>Bezeichnung:</th>
      <td><?php echo $lebenslauf->getBezeichnung() ?></td>
    </tr>
    <tr>
      <th>Beschreibung:</th>
      <td><?php echo $lebenslauf->getBeschreibung() ?></td>
    </tr>
    <tr>
      <th>Art:</th>
      <td><?php echo $lebenslauf->getLebenslaufKategorien()->getBezeichnung() ?></td>
    </tr>
    <tr>
      <th>Beginn:</th>
      <td><?php echo format_date($lebenslauf->getBeginn(), 'dd/MM/yyyy') ?></td>
    </tr>
    <tr>
      <th>Ende:</th>
      <td><?php echo format_date($lebenslauf->getEnde(), 'dd/MM/yyyy') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('lebenslauf/edit?ll_id='.$lebenslauf->getLlId()) ?>">Bearbeiten</a>
&nbsp;
<a href="<?php echo url_for('lebenslauf/index') ?>">Zurück zur Übersicht</a>
