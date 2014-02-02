<?php 
use_stylesheets_for_form($form); 
use_javascripts_for_form($form); 
$form->setSelectedDates($selectedDates);
echo $form;

?>
