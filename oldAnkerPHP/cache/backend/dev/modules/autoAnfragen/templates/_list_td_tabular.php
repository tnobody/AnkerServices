<td class="sf_admin_text sf_admin_list_td_anfrage_id">
  <?php echo link_to($anfragen->getAnfrageId(), 'anfragen_edit', $anfragen) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_sf_guard_user_id">
  <?php echo $anfragen->getSfGuardUserId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_kommentar">
  <?php echo $anfragen->getKommentar() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_profil_id">
  <?php echo $anfragen->getProfilId() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_angelegt">
  <?php echo false !== strtotime($anfragen->getAngelegt()) ? format_date($anfragen->getAngelegt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_letzte_aenderung">
  <?php echo false !== strtotime($anfragen->getLetzteAenderung()) ? format_date($anfragen->getLetzteAenderung(), "f") : '&nbsp;' ?>
</td>
