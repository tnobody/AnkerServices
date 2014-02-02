<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($adressen->getId(), 'adressen_edit', $adressen) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_alias">
  <?php echo $adressen->getAlias() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_strasse_und_hausnr">
  <?php echo $adressen->getStrasseUndHausnr() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_plz">
  <?php echo $adressen->getPlz() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_ort">
  <?php echo $adressen->getOrt() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_land">
  <?php echo $adressen->getLand() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_profil_id">
  <?php echo $adressen->getProfilId() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_letzte_aenderung">
  <?php echo false !== strtotime($adressen->getLetzteAenderung()) ? format_date($adressen->getLetzteAenderung(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_angelegt">
  <?php echo false !== strtotime($adressen->getAngelegt()) ? format_date($adressen->getAngelegt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_latitude">
  <?php echo $adressen->getLatitude() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_longitude">
  <?php echo $adressen->getLongitude() ?>
</td>
