<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_merklisten_id">
  <?php if ('merklisten_id' == $sort[0]): ?>
    <?php echo link_to(__('Merklisten', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=merklisten_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Merklisten', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=merklisten_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_query">
  <?php if ('query' == $sort[0]): ?>
    <?php echo link_to(__('Query', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=query&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Query', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=query&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_angelegt">
  <?php if ('angelegt' == $sort[0]): ?>
    <?php echo link_to(__('Angelegt', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=angelegt&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Angelegt', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=angelegt&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_letzte_aenderung">
  <?php if ('letzte_aenderung' == $sort[0]): ?>
    <?php echo link_to(__('Letzte aenderung', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=letzte_aenderung&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Letzte aenderung', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=letzte_aenderung&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_sf_guard_user_id">
  <?php if ('sf_guard_user_id' == $sort[0]): ?>
    <?php echo link_to(__('Sf guard user', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=sf_guard_user_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Sf guard user', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=sf_guard_user_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_foreignkey sf_admin_list_th_profil_id">
  <?php if ('profil_id' == $sort[0]): ?>
    <?php echo link_to(__('Profil', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=profil_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Profil', array(), 'messages'), '@profil_merkliste', array('query_string' => 'sort=profil_id&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>