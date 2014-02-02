<h2>Kompetenz-Kategorien</h2>

<table>
  <thead>
    <tr>
      <th>Bezeichnung</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kompetenz_kategoriens as $kompetenz_kategorien): ?>
    <tr>
      <td><a href="<?php echo url_for('kompetenz_kategorien/show?kompetenz_kategorie_id='.$kompetenz_kategorien->getKompetenzKategorieId()) ?>"><?php echo $kompetenz_kategorien->getBezeichnung() ?></a></td>
      <td><?php echo $kompetenz_kategorien->getBezeichnung() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('kompetenz_kategorien/new') ?>">Neue Kategorie</a>
