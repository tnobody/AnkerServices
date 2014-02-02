<td class="sf_admin_text sf_admin_list_td_kompetenz_id">
  <?php echo link_to($kompetenzen->getKompetenzId(), 'kompetenzen_edit', $kompetenzen) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_bezeichnung">
  <?php echo $kompetenzen->getBezeichnung() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_beschreibung">
  <?php echo $kompetenzen->getBeschreibung() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_kompetenz_kategorie_id">
  <?php echo $kompetenzen->getKompetenzKategorieId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_aktiv">
  <?php echo $kompetenzen->getAktiv() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_letzte_aenderung">
  <?php echo false !== strtotime($kompetenzen->getLetzteAenderung()) ? format_date($kompetenzen->getLetzteAenderung(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_angelegt">
  <?php echo false !== strtotime($kompetenzen->getAngelegt()) ? format_date($kompetenzen->getAngelegt(), "f") : '&nbsp;' ?>
</td>
