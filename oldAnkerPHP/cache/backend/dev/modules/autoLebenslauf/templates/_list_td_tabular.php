<td class="sf_admin_text sf_admin_list_td_ll_id">
  <?php echo link_to($lebenslauf->getLlId(), 'lebenslauf_edit', $lebenslauf) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_profil_id">
  <?php echo $lebenslauf->getProfilId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_bezeichnung">
  <?php echo $lebenslauf->getBezeichnung() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_beschreibung">
  <?php echo $lebenslauf->getBeschreibung() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_letzte_aenderung">
  <?php echo false !== strtotime($lebenslauf->getLetzteAenderung()) ? format_date($lebenslauf->getLetzteAenderung(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_art_id">
  <?php echo $lebenslauf->getArtId() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_beginn">
  <?php echo false !== strtotime($lebenslauf->getBeginn()) ? format_date($lebenslauf->getBeginn(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_ende">
  <?php echo false !== strtotime($lebenslauf->getEnde()) ? format_date($lebenslauf->getEnde(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_aktiv">
  <?php echo $lebenslauf->getAktiv() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_angelegt">
  <?php echo false !== strtotime($lebenslauf->getAngelegt()) ? format_date($lebenslauf->getAngelegt(), "f") : '&nbsp;' ?>
</td>
