<td class="sf_admin_text sf_admin_list_td_kompetenz_kategorie_id">
  <?php echo link_to($kompetenzkategorien->getKompetenzKategorieId(), 'kompetenzkategorien_edit', $kompetenzkategorien) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_bezeichnung">
  <?php echo $kompetenzkategorien->getBezeichnung() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_beschreibung">
  <?php echo $kompetenzkategorien->getBeschreibung() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_aktiv">
  <?php echo $kompetenzkategorien->getAktiv() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_root_id">
  <?php echo $kompetenzkategorien->getRootId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_lft">
  <?php echo $kompetenzkategorien->getLft() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_rgt">
  <?php echo $kompetenzkategorien->getRgt() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_level">
  <?php echo $kompetenzkategorien->getLevel() ?>
</td>
