<h2><?php echo $adressen->getAlias()?>:</h2>

<table>
  <tbody>
    <tr>
      <th>Straße und Hausnummer:</th>
      <td><?php echo $adressen->getStrasseUndHausnr() ?></td>
    </tr>
    <tr>
      <th>PLZ:</th>
      <td><?php echo $adressen->getPlz() ?></td>
    </tr>
    <tr>
      <th>Ort:</th>
      <td><?php echo $adressen->getOrt() ?></td>
    </tr>
    <tr>
      <th>Land:</th>
      <td><?php echo $adressen->getLand() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('adressen/edit?id='.$adressen->getId()) ?>">Bearbeiten</a>
&nbsp;
<a href="<?php echo url_for('adressen/index') ?>">Zur Übersicht</a>
