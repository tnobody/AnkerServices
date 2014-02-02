<td class="sf_admin_text sf_admin_list_td_merklisten_id">
  <?php echo link_to($profil_merkliste->getMerklistenId(), 'profil_merkliste_edit', $profil_merkliste) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_query">
  <?php echo $profil_merkliste->getQuery() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_angelegt">
  <?php echo false !== strtotime($profil_merkliste->getAngelegt()) ? format_date($profil_merkliste->getAngelegt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_letzte_aenderung">
  <?php echo false !== strtotime($profil_merkliste->getLetzteAenderung()) ? format_date($profil_merkliste->getLetzteAenderung(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_sf_guard_user_id">
  <?php echo $profil_merkliste->getSfGuardUserId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_profil_id">
  <?php echo $profil_merkliste->getProfilId() ?>
</td>
