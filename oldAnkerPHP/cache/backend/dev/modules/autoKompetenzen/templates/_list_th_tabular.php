<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_kompetenz_id">
  <?php if ('kompetenz_id' == $sort[0]): ?>
    <?php echo link_to(__('Kompetenz', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=kompetenz_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Kompetenz', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=kompetenz_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_bezeichnung">
  <?php if ('bezeichnung' == $sort[0]): ?>
    <?php echo link_to(__('Bezeichnung', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=bezeichnung&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Bezeichnung', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=bezeichnung&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_beschreibung">
  <?php if ('beschreibung' == $sort[0]): ?>
    <?php echo link_to(__('Beschreibung', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=beschreibung&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Beschreibung', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=beschreibung&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_kompetenz_kategorie_id">
  <?php if ('kompetenz_kategorie_id' == $sort[0]): ?>
    <?php echo link_to(__('Kompetenz kategorie', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=kompetenz_kategorie_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Kompetenz kategorie', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=kompetenz_kategorie_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_aktiv">
  <?php if ('aktiv' == $sort[0]): ?>
    <?php echo link_to(__('Aktiv', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=aktiv&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aktiv', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=aktiv&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_letzte_aenderung">
  <?php if ('letzte_aenderung' == $sort[0]): ?>
    <?php echo link_to(__('Letzte aenderung', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=letzte_aenderung&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Letzte aenderung', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=letzte_aenderung&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_angelegt">
  <?php if ('angelegt' == $sort[0]): ?>
    <?php echo link_to(__('Angelegt', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=angelegt&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Angelegt', array(), 'messages'), '@kompetenzen', array('query_string' => 'sort=angelegt&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>