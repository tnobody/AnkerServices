<table>
  <tbody>
    <tr>
      <th>Datum:</th>
      <td><?php echo $verfuegbarkeit->getDatum() ?></td>
    </tr>
    <tr>
      <th>Profil:</th>
      <td><?php echo $verfuegbarkeit->getProfilId() ?></td>
    </tr>
    <tr>
      <th>Stundenzahl:</th>
      <td><?php echo $verfuegbarkeit->getStundenzahl() ?></td>
    </tr>
    <tr>
      <th>Zeitraum:</th>
      <td><?php echo $verfuegbarkeit->getZeitraum() ?></td>
    </tr>
    <tr>
      <th>Anmerkung:</th>
      <td><?php echo $verfuegbarkeit->getAnmerkung() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('verfuegbarkeit/edit?datum='.$verfuegbarkeit->getDatum().'&profil_id='.$verfuegbarkeit->getProfilId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('verfuegbarkeit/index') ?>">List</a>
