<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_kompetenz_kategorie_id">
  <?php if ('kompetenz_kategorie_id' == $sort[0]): ?>
    <?php echo link_to(__('Kompetenz kategorie', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=kompetenz_kategorie_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Kompetenz kategorie', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=kompetenz_kategorie_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_bezeichnung">
  <?php if ('bezeichnung' == $sort[0]): ?>
    <?php echo link_to(__('Bezeichnung', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=bezeichnung&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Bezeichnung', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=bezeichnung&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_beschreibung">
  <?php if ('beschreibung' == $sort[0]): ?>
    <?php echo link_to(__('Beschreibung', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=beschreibung&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Beschreibung', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=beschreibung&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_aktiv">
  <?php if ('aktiv' == $sort[0]): ?>
    <?php echo link_to(__('Aktiv', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=aktiv&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Aktiv', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=aktiv&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_root_id">
  <?php if ('root_id' == $sort[0]): ?>
    <?php echo link_to(__('Root', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=root_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Root', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=root_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_lft">
  <?php if ('lft' == $sort[0]): ?>
    <?php echo link_to(__('Lft', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=lft&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Lft', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=lft&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_rgt">
  <?php if ('rgt' == $sort[0]): ?>
    <?php echo link_to(__('Rgt', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=rgt&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Rgt', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=rgt&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_level">
  <?php if ('level' == $sort[0]): ?>
    <?php echo link_to(__('Level', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=level&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Level', array(), 'messages'), '@kompetenzkategorien', array('query_string' => 'sort=level&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>