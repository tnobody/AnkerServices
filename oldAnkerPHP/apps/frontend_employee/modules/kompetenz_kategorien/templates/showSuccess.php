<h2>Kompetenz-Kategorie Detailansicht</h2>
<table>
  <tbody>
    <tr>
      <th>Kompetenz kategorie:</th>
      <td><?php echo $kompetenz_kategorien->getKompetenzKategorieId() ?></td>
    </tr>
    <tr>
      <th>Bezeichnung:</th>
      <td><?php echo $kompetenz_kategorien->getBezeichnung() ?></td>
    </tr>
    <tr>
      <th>Lft:</th>
      <td><?php echo $kompetenz_kategorien->getLft() ?></td>
    </tr>
    <tr>
      <th>Rgt:</th>
      <td><?php echo $kompetenz_kategorien->getRgt() ?></td>
    </tr>
    <tr>
      <th>Level:</th>
      <td><?php echo $kompetenz_kategorien->getLevel() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('kompetenz_kategorien/edit?kompetenz_kategorie_id='.$kompetenz_kategorien->getKompetenzKategorieId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('kompetenz_kategorien/index') ?>">List</a>
