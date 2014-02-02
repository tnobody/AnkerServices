<h2>Ihre vorhandene Adressen</h2>
<p>
    Bitte geben Sie alle Adressen an, unter denen Sie erreichbar sind (z.B. Studien- und Heimatadresse, geschäftlicher Kontakt, etc.).
</p>
<table>
    <thead>
        <tr>
            <th>Kontaktadresse</th>
            <th>Alias</th>
            <th>Straße und Hausnr.</th>
            <th>PLZ</th>
            <th>Ort</th>
            <th>Land</th>
        </tr>
    </thead>
    <form action="">
        <tbody>
            <?php foreach ($adressens as $adressen): ?>
                <tr>
                    <td><?php //echo radiobutton_tag('kontaktadresse[]', 'kontaktadr', true) ?></td>
                    <td><a href="<?php echo url_for('adressen/show?id=' . $adressen->getId()) ?>"><?php echo $adressen->getAlias() ?></a></td>
                    <td><?php echo $adressen->getStrasseUndHausnr() ?></td>
                    <td><?php echo $adressen->getPlz() ?></td>
                    <td><?php echo $adressen->getOrt() ?></td>
                    <td><?php echo $adressen->getLand() ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </form>
</table>
<p>
    <a href="<?php echo url_for('adressen/new') ?>">Neue Adresse</a>
</p>