<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($dokumente->getId(), 'dokumente_edit', $dokumente) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_profil_id">
  <?php echo $dokumente->getProfilId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_titel">
  <?php echo $dokumente->getTitel() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_angelegt">
  <?php echo false !== strtotime($dokumente->getAngelegt()) ? format_date($dokumente->getAngelegt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_letzte_aenderung">
  <?php echo false !== strtotime($dokumente->getLetzteAenderung()) ? format_date($dokumente->getLetzteAenderung(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_pfad">
  <?php echo $dokumente->getPfad() ?>
</td>
